<?php
 
namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\GlobalDetails\TeachmeCurriculum;
use App\Models\GlobalDetails\TeachmeGrade;
use App\Models\GlobalDetails\TeachmeSubject;
use App\Models\Translation\Language;
use App\Models\GlobalDetails\TeachmeLocation;
use App\Models\GlobalDetails\TeachmeCheckProfile;
 
use App\Models\GlobalDetails\TeachmeCurriculumRelationship;
use App\Models\GlobalDetails\TeachmeLanguagesRelationship;
use App\Models\GlobalDetails\TeachmeSubjectRelationship;
use App\Models\GlobalDetails\TeachmeGradeRelationship;
use App\Models\GlobalDetails\TeachmeTutorEducation;
use App\Models\GlobalDetails\TeachmeTutorExperience;
use App\Models\GlobalDetails\TeachmeTutorDocument;
use App\Models\GlobalDetails\TeachmeLocationRelationship;
use App\Models\Payment\TeachmePayment;
use Laravel\Cashier\PaymentMethod;

use App\Models\Web\PostData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Mail;
use Resend\Laravel\Facades\Resend;
use DB;
use Stripe\Stripe;
use Embed\Embed;
use Session;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        if (auth()->check()) {
            return redirect('/dashboard');
        }

        $title = 'Register Page';
        $description = 'This is Rregister Page';
        $image = '';

        return view('auth.webregister' , get_defined_vars());
    }

    public function register(Request $request)
    {
        $validation = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required'
            );
        
        $validatedData = $request->validate($validation);
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);


        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $user->id, 
            'token' => $token
        ]);


        // Send mail
        $user_type = $validatedData['role'];
        $logo = email_logo();
        $html = view('emails.VerificationEmail', compact('token','user_type','logo'))->render();
        Resend::emails()->send([
            'from' => 'TeachMe '.env('MAIL_FROM_ADDRESS'),
            'to' => [$validatedData['email']],
            'subject' => 'Welcome to TeachMe',
            'html' => $html, 
            // Include the reset link in the email content
        ]);
    
        return redirect('/login')->with('success', 'Your account has been created, and an verification email has been sent to your provided email. Please check your spam or junk mail folder to make sure you dont miss any emails.');
    }

// verifyAccount
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        $message = 'Sorry your email cannot be identified.';
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->email_verified_at) {
                $verifyUser->user->email_verified_at = now();
                $verifyUser->user->save();
                // email test, correct or not
                checkmails($verifyUser);
                $message = "Congratulations! Your email has been verified.";
            } else {
                $message = "Congratulations! Your email has been verified.";
            }
        }
  
        return redirect()->route('login')->with('success', $message);
    }

  

    // add customer
        public function all_customer(Request $request)
    {
        $search = $request->search;
        $role = array('user');
        $query = User::query()->where('role','student');
        if (!empty($search)) {
            $query->where(function ($subquery) use ($search) {
                $subquery->where('name', 'LIKE', "%$search%")
                        ->orWhere('email', 'LIKE', "%$search%")
                        ->orWhere('phone', 'LIKE', "%$search%");
            });
        }
        $all_cusromer = $query->latest()->get();
        return view('auth.all_customer', compact('all_cusromer','role'));
    }


    // my profile
        public function my_profile(Request $request)
    {       
            $activeSubscription = $request->user()->subscription($request->plan);
            try {
                $userid = Crypt::decrypt($request->uid);
            } catch (DecryptException $e) {
                return redirect()->back()->with('error', 'Invalid payload');
            }

            $check_user_type = User::find($userid);
            $check_profile = check_profile($userid);
            if ($check_user_type->type == 'admin') {
                return redirect('edit-profile/'.encrypt(Auth::user()->id));
            }


        $itsmain = 'show active';
        $itsmainbtn = 'active';
        $itslicense = 'null';
        $itslicensebtn = 'null';
        if (Session::get('document') != null) {
            $itslicense = 'show active';
            $itslicensebtn = 'active';
            $itsmain = 'null';
            $itsmainbtn = 'null';
        }


        $profile = User::with(
            [
                'teachme_curriculum_relationships',
                'teachme_grades_relationships',
                'teachme_subject_relationships',
                'teachme_languages_relationships',
            ])->find($userid);

            if (empty($userid)) {
                return redirect()->back()->with('error', 'We cannot find any associated user.');
            }


        $TeachmeCurriculum = TeachmeCurriculum::get();
        $TeachmeGrade = TeachmeGrade::get();
        $TeachmeSubject = TeachmeSubject::get();
        $TeachmeLanguage = Language::get();
        $education_data = TeachmeTutorEducation::where('tutor_id', $userid)->get();
        $experience_data = TeachmeTutorExperience::where('tutor_id', $userid)->get();
        $document_data = TeachmeTutorDocument::where('tutor_id', $userid)->latest()->get();
        $TeachmeLocationRelationship = TeachmeLocationRelationship::where('tutor_id',$userid)->first();

        $TeachmePayment = null;
        if ($check_user_type->role == 'tutor') {
            $TeachmePayment = $check_user_type->subscription(2);
        }else{
            $TeachmePayment = $check_user_type->subscription(1);
        }
        

        $head = 'User Profile';
        $title = 'Profile Page';
        $description = 'This is Profile Page';
        $image = '';

        $content = 'theme_1.userprofile.profile';
        return view($content, [
            'head' => $head,
            'profile' => $profile,
            'TeachmeCurriculum' => $TeachmeCurriculum,
            'TeachmeGrade' => $TeachmeGrade,
            'TeachmeSubject' => $TeachmeSubject,
            'TeachmeLanguage' => $TeachmeLanguage,
            'education_data' => $education_data,
            'experience_data' => $experience_data,
            'document_data' => $document_data,
            'TeachmeLocationRelationship' => $TeachmeLocationRelationship,
            'TeachmePayment' => $TeachmePayment,
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'check_user_type' => $check_user_type,
            'check_profile' => $check_profile,
            'itsmain' => $itsmain,
            'itsmainbtn' => $itsmainbtn,
            'itslicense' => $itslicense,
            'itslicensebtn' => $itslicensebtn,
        ]);

    }


        public function getSubLocations(Request $request)
    {
        $subLocations = TeachmeLocation::where('parent_id', $request->location_id)->pluck('name', 'id');
        return response()->json($subLocations);
    }


    // edit profile
        public function edit_profile(Request $request)
    {
        $userId = Crypt::decrypt($request->uid);
        $check_profile = check_profile($userId);
        $user = User::with(
            [
                'teachme_curriculum_relationships',
                'teachme_grades_relationships',
                'teachme_subject_relationships',
                'teachme_languages_relationships',
            ])->find($userId);



        if (Auth::user()->type == 'admin') {
            $view = 'auth.profile';
        }else{
            $view = 'theme_1.userprofile.edit_profile';
        }


        // manage tabs
        $itsmain = 'null';
        $itsmainbtn = 'null';
        $itsexpertise = 'null';
        $itsexpertisebtn = 'null';
        $itseducation = 'null';
        $itseducationbtn = 'null';
        $itsexperience = 'null';
        $itsexperiencebtn = 'null';
        $itslicense = 'null';
        $itslicensebtn = 'null';
        $itspayment = 'null';
        $itspaymentbtn = 'null';
        $itssetting = 'null';
        $itssettingbtn = 'null';
        if (isset($request->itsmain)) {
            $itsmain = 'show active';
            $itsmainbtn = 'active';
        }
        if (isset($request->itsexpertise)) {
            $itsexpertise = 'show active';
            $itsexpertisebtn = 'active';
        }
        if (isset($request->editeducation)) {
            $itseducation = 'show active';
            $itseducationbtn = 'active';
        }

        if (isset($request->addeducation)) {
            $itseducation = 'show active';
            $itseducationbtn = 'active';
        }
        
        if (isset($request->editexperience)) {
            $itsexperience = 'show active';
            $itsexperiencebtn = 'active';
        }
        
        if (isset($request->addexperience)) {
            $itsexperience = 'show active';
            $itsexperiencebtn = 'active';
        }
        
        if (isset($request->adddocument)) {
            $itslicense = 'show active';
            $itslicensebtn = 'active';
        }
        
        if (isset($request->editdocument)) {
            $itslicense = 'show active';
            $itslicensebtn = 'active';
        }
        
        if (isset($request->adddocument)) {
            $itslicense = 'show active';
            $itslicensebtn = 'active';
        }
        
        if (isset($request->itspayments)) {
            $itspayment = 'show active';
            $itspaymentbtn = 'active';
        }
        
        if (isset($request->itsettings)) {
            $itssetting = 'show active';
            $itssettingbtn = 'active';
        }

        $TeachmeCurriculum = TeachmeCurriculum::get();
        $TeachmeGrade = TeachmeGrade::get();
        $TeachmeSubject = TeachmeSubject::get();
        $TeachmeLanguage = Language::get();
        $TeachmeLocation = TeachmeLocation::where('parent_id', null)->first();
        $subTeachmeLocation = TeachmeLocation::whereNotNull('parent_id')->get();

        $TeachmeLocationRelationship = TeachmeLocationRelationship::where('tutor_id',$userId)->first();
        
        $education_data = null;
        $editeducation = false;
        $addeducation = false;
        if (isset($request->editeducation)) {
            $editeducation = true;
            $education_data = TeachmeTutorEducation::find($request->editeducation);
        }
        if (isset($request->addeducation) || !isset($request->editeducation)) {
            $addeducation = true;
        }

        
        $experience_data = null;
        $editexperience = false;
        $addexperience = false;
        if (isset($request->editexperience)) {
            $editexperience = true;
            $experience_data = TeachmeTutorExperience::find($request->editexperience);
        }
        if (isset($request->addexperience) || !isset($request->editexperience)) {
            $addexperience = true;
        }
        
        $document_data = null;
        $editdocument = false;
        $adddocument = false;
        if (isset($request->editdocument)) {
            $editdocument = true;
            $document_data = TeachmeTutordocument::find($request->editdocument);
        }
        if (isset($request->adddocument)) {
            $adddocument = true;
        }


        $TeachmePayment = null;
        if ($user->role == 'tutor') {
            $TeachmePayment = $user->subscription(2);
        }else{
            $TeachmePayment = $user->subscription(1);
        }
        

        $totaldocument_data = TeachmeTutorDocument::where('tutor_id', $userId)->count();
        // dd($totaldocument_data);

        
        $head = 'Edit Profile';
        $title = 'Edit Profile Page';
        $description = 'This is Edit Profile Page';
        $image = '';


        return view($view, compact(
            'user',
            'totaldocument_data',
            'TeachmeCurriculum',
            'TeachmeGrade',
            'TeachmeSubject',
            'TeachmeLanguage',
            'TeachmeLocation',
            'subTeachmeLocation',
            'education_data',
            'addeducation',
            'editeducation',
            'experience_data',
            'addexperience',
            'editexperience',
            'itsmain',
            'itsmainbtn',
            'itsexpertise',
            'itsexpertisebtn',
            'itseducation',
            'itseducationbtn',
            'itsexperience',
            'itsexperiencebtn',
            'itslicense',
            'itslicensebtn',
            'itspayment',
            'itspaymentbtn',
            'itssetting',
            'itssettingbtn',
            'document_data',
            'adddocument',
            'editdocument',
            'TeachmeLocationRelationship',
            'TeachmePayment',
            'check_profile',
            'title',
            'description',
            'image',
            'head',
            'head',
        ));
    }

    public function update_profile(Request $request, User $user)
    {   
        if ($request->param == 'reset_password') {
            $user = Auth::user();
            $request->validate([
                'oldpassword' => 'nullable|string|max:200',
                'password' => 'nullable|string|max:200|confirmed',
            ]);

            // Check if old password matches
            if (!Hash::check($request->oldpassword, $user->password)) {
                return redirect()->back()->with('error', 'Apologies, The old password you provided is incorrect.');
            }
            // Update password
            $user->password = bcrypt($request->password);
            $user->save();
            
            if (Auth()->user()->type == 'admin') {
                return redirect('edit-profile/'.encrypt(Auth::user()->id))->with('success', 'Profile updated successfully');
            }

            return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Password updated successfully');
        }

        if ($request->param == 'main') {
        // Validate the request data
            $validatedData = $request->validate([
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'name' => 'required|string|max:255',
                'lname' => 'nullable|string|max:255',
                'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
                'description' => 'nullable',
                'video_url' => 'nullable|url',
                'zip_code' => 'nullable',
                'virtual_mode' => 'nullable',
                'in_person_mode' => 'nullable',
            ]);

            $embedUrl = '';
            // if (isset($request->video_url)) {
            //     $embed = new Embed();
            //     $info = $embed->get($request->video_url);
            //     if ($info->providerName === 'YouTube') {

            //         $html_url = $info->code->html;
            //         preg_match('/src="(.*?)"/', $html_url, $matches);
            //         $embedUrl = $matches[1] ?? '';

            //     } else {
            //         $embedUrl = '';
            //     }

            // }else{
            //     $embedUrl = '';
            // }

            $virtual_mode = '';
            $in_person_mode = '';
            if (isset($request->virtual_mode)) {
                $virtual_mode = $request->virtual_mode;
            }
            if (isset($request->in_person_mode)) {
                $in_person_mode = $request->in_person_mode;
            }
            $user->name = $validatedData['name'];
            $user->lname = $validatedData['lname'];
            $user->phone = $validatedData['phone'];
            $user->description = $validatedData['description'];
            $user->video_url = $validatedData['video_url'];
            $user->embedUrl = $embedUrl;
            $user->virtual_mode = $virtual_mode;
            $user->in_person_mode = $in_person_mode;

if ($request->hasFile('profile_pic')) {

        // Attempt to delete the old profile picture
    Storage::delete('public/' . $user->profile_pic);
    Storage::delete('public/' . $user->blur_profile_pic);
    // Get the uploaded image
    $image = $request->file('profile_pic');
    
    // Store the original image
    $imagePath = $image->store('user_profile', 'public');
    
    // Create a blurred version of the image
    $imageResource = imagecreatefromstring(file_get_contents('storage/app/public/' . $imagePath));
    
    $smallImageResource = imagescale($imageResource, 10, 10);
    $blurredImageResource = imagescale($smallImageResource, imagesx($imageResource), imagesy($imageResource));
    
    // Save the blurred image to the same directory
    $blurImagePath = 'public/' . dirname($imagePath) . '/blur_' . basename($imagePath);

    imagejpeg($blurredImageResource, storage_path('app/' . $blurImagePath));

    
    // Free memory
    imagedestroy($imageResource);
    imagedestroy($smallImageResource);
    imagedestroy($blurredImageResource);
    
    // Update the user's profile pic and blurred profile pic paths
    $user->profile_pic = $imagePath;
    $user->blur_profile_pic = str_replace('public/', '', $blurImagePath); // Adjust path format
    
} else {
    $user->profile_pic = $request->old_profile_pic;
}


            // Save the updated user profile
            TeachmeLocationRelationship::where('tutor_id', $user->id)->delete();

            if (Auth::user()->type != 'admin') {
                $TeachmeLocationRelationship = new TeachmeLocationRelationship();
                $TeachmeLocationRelationship->location_id =$request->location_id;
                $TeachmeLocationRelationship->sub_location_id =$request->sub_location;
                $TeachmeLocationRelationship->tutor_id = $user->id;
                $TeachmeLocationRelationship->save();
            }

        if (Auth::user()->role == 'tutor') {
                $TeachmeCheckProfile = TeachmeCheckProfile::where('tutor_id', $user->id)->first();
                $TeachmeCheckProfile->profile = 1;
                $TeachmeCheckProfile->save();
        }


        }

// expertise
        if ($request->param == 'expertise') {
        // Validate the request data
            $validatedData = $request->validate([
                'curriculum_id' => 'required|array|min:1',
                'grade_id' => 'required|array|min:1',
                'subject_id' => 'required|array|min:1',
                'language_id' => 'required|array|min:1',
            ]);


            if (!empty($request->curriculum_id)) {
                // Delete existing relationships for the tutor
                TeachmeCurriculumRelationship::where('tutor_id', $user->id)->delete();
                // Add new relationships
                foreach ($request->curriculum_id as $curriculumId) {
                    $teachmeCurriculumRelationship = new TeachmeCurriculumRelationship();
                    $teachmeCurriculumRelationship->curriculum_id = $curriculumId;
                    $teachmeCurriculumRelationship->tutor_id = $user->id;
                    // Add any other attributes as needed
                    $teachmeCurriculumRelationship->save();
                }
            }

            if (!empty($request->grade_id)) {
                // Delete existing relationships for the tutor
                TeachmeGradeRelationship::where('tutor_id', $user->id)->delete();
                // Add new relationships
                foreach ($request->grade_id as $grade_id) {
                    $TeachmeGradeRelationship = new TeachmeGradeRelationship();
                    $TeachmeGradeRelationship->grade_id = $grade_id;
                    $TeachmeGradeRelationship->tutor_id = $user->id;
                    // Add any other attributes as needed
                    $TeachmeGradeRelationship->save();
                }
            }

            if (!empty($request->subject_id)) {
                // Delete existing relationships for the tutor
                TeachmeSubjectRelationship::where('tutor_id', $user->id)->delete();
                // Add new relationships
                foreach ($request->subject_id as $subject_id) {
                    $TeachmeSubjectRelationship = new TeachmeSubjectRelationship();
                    $TeachmeSubjectRelationship->subject_id = $subject_id;
                    $TeachmeSubjectRelationship->tutor_id = $user->id;
                    // Add any other attributes as needed
                    $TeachmeSubjectRelationship->save();
                }
            }

            if (!empty($request->language_id)) {
                // Delete existing relationships for the tutor
                TeachmeLanguagesRelationship::where('tutor_id', $user->id)->delete();
                // Add new relationships
                foreach ($request->language_id as $language_id) {
                    $TeachmeLanguagesRelationship = new TeachmeLanguagesRelationship();
                    $TeachmeLanguagesRelationship->language_id = $language_id;
                    $TeachmeLanguagesRelationship->tutor_id = $user->id;
                    // Add any other attributes as needed
                    $TeachmeLanguagesRelationship->save();
                }

                if (Auth::user()->role == 'tutor') {
                $TeachmeCheckProfile = TeachmeCheckProfile::where('tutor_id', $user->id)->first();
                $TeachmeCheckProfile->expertise = 1;
                $TeachmeCheckProfile->save();
                }

                // Redirect back with success message
                return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Expertise updated successfully.');
            }

        }


// add_student_education
        if ($request->param == 'add_student_education') {
        // Validate the request data
            $validatedData = $request->validate([
                'student_school' => 'nullable',
                'student_curriculum' => 'required',
                'student_grade' => 'required'
            ]);

            $user = Auth::user();
            $user->student_school = $request->student_school;
            $user->student_curriculum = $request->student_curriculum;
            $user->student_grade = $request->student_grade;
            $user->save();

            // Redirect back with success message
            return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Education added successfully.');
        }

// addeducation
        if ($request->param == 'addeducation') {
        // Validate the request data
            $validatedData = $request->validate([
                'degree' => 'required',
                'institution' => 'required',
                'start_date' => 'required',
                'end_date' => 'nullable',
            ]);

            if (isset($request->currently_studying)) {
                $currently_studying = 1;
                $education_end_date = null;
            }else{
                $currently_studying = 0;
                $education_end_date = $request->end_date;
            }

            $TeachmeTutorEducation = new TeachmeTutorEducation();
            $TeachmeTutorEducation->degree = $request->degree;
            $TeachmeTutorEducation->institution = $request->institution;
            $TeachmeTutorEducation->start_date = $request->start_date;
            $TeachmeTutorEducation->end_date = $education_end_date;
            $TeachmeTutorEducation->currently_studying = $currently_studying;
            $TeachmeTutorEducation->tutor_id = $user->id;
            $TeachmeTutorEducation->save();

            if (Auth::user()->role == 'tutor') {
                $TeachmeCheckProfile = TeachmeCheckProfile::where('tutor_id', $user->id)->first();
                $TeachmeCheckProfile->education = 1;
                $TeachmeCheckProfile->save();
            }
            // Redirect back with success message
        return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Education added successfully.');
        }

// editeducation
        if ($request->param == 'editeducation') {
        // Validate the request data
            $validatedData = $request->validate([
                'degree' => 'required',
                'institution' => 'required',
                'start_date' => 'required',
                'end_date' => 'nullable',
            ]);


            if (isset($request->currently_studying)) {
                $currently_studying = 1;
                $education_end_date = null;
            }else{
                $currently_studying = 0;
                $education_end_date = $request->end_date;
            }

            $TeachmeTutorEducation = TeachmeTutorEducation::find($request->education_id);

            $TeachmeTutorEducation->degree = $request->degree;
            $TeachmeTutorEducation->institution = $request->institution;
            $TeachmeTutorEducation->start_date = $request->start_date;
            $TeachmeTutorEducation->end_date = $education_end_date;
            $TeachmeTutorEducation->currently_studying = $currently_studying;
            $TeachmeTutorEducation->tutor_id = $user->id;
            $TeachmeTutorEducation->save();

            if (Auth::user()->role == 'tutor') {
                $TeachmeCheckProfile = TeachmeCheckProfile::where('tutor_id', $user->id)->first();
                $TeachmeCheckProfile->education = 1;
                $TeachmeCheckProfile->save();
            }
            // Redirect back with success message
            return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Education Updated successfully.');
        }


// addexperience
        if ($request->param == 'addexperience') {
        // Validate the request data
            $validatedData = $request->validate([
                'company' => 'required',
                'position' => 'required',
                'start_date' => 'required',
                'end_date' => 'nullable'
            ]);

        if (isset($request->currently_working)) {
            $currently_working = 1;
            $experience_end_date = null;
        }else{
            $currently_working = 0;
            $experience_end_date = $request->end_date;
        }

        $TeachmeTutorExperience = new TeachmeTutorExperience();
        $TeachmeTutorExperience->company = $request->company;
        $TeachmeTutorExperience->position = $request->position;
        $TeachmeTutorExperience->start_date = $request->start_date;
        $TeachmeTutorExperience->end_date = $experience_end_date;
        $TeachmeTutorExperience->currently_working = $currently_working;
        $TeachmeTutorExperience->tutor_id = $user->id;
        $TeachmeTutorExperience->save();

        if (Auth::user()->role == 'tutor') {
            $TeachmeCheckProfile = TeachmeCheckProfile::where('tutor_id', $user->id)->first();
            $TeachmeCheckProfile->experience = 1;
            $TeachmeCheckProfile->save();
        }
        // Redirect back with success message
        return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Experience added successfully.');
    }

// editexperience
        if ($request->param == 'editexperience') {
        // Validate the request data
            $validatedData = $request->validate([
                'company' => 'required',
                'position' => 'required',
                'start_date' => 'required',
                'end_date' => 'nullable'
            ]);

        if (isset($request->currently_working)) {
            $currently_working = 1;
            $experience_end_date = null;
        }else{
            $currently_working = 0;
            $experience_end_date = $request->end_date;
        }


        $TeachmeTutorExperience = TeachmeTutorExperience::find($request->experience_id);

        $TeachmeTutorExperience->company = $request->company;
        $TeachmeTutorExperience->position = $request->position;
        $TeachmeTutorExperience->start_date = $request->start_date;
        $TeachmeTutorExperience->end_date = $experience_end_date;
        $TeachmeTutorExperience->currently_working = $currently_working;
        $TeachmeTutorExperience->tutor_id = $user->id;
        $TeachmeTutorExperience->save();

        if (Auth::user()->role == 'tutor') {
            $TeachmeCheckProfile = TeachmeCheckProfile::where('tutor_id', $user->id)->first();
            $TeachmeCheckProfile->experience = 1;
            $TeachmeCheckProfile->save();
        }
        // Redirect back with success message
        return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Experience Updated successfully.');
    }


// adddocument
        if ($request->param == 'adddocument') {
        // Validate the request data
            $validatedData = $request->validate([
                'title' => 'required',
                'expiry_date' => 'required',
                'document' => 'required|file|mimes:pdf,jpeg,png,jpg,webp'
            ]);
 

            $TeachmeTutorDocument = new TeachmeTutorDocument();
            // Handle image upload if needed
            if ($request->hasFile('document')) {
                $image = $request->file('document');
                $imagePath = $image->store('document', 'public');
                $TeachmeTutorDocument->document = $imagePath;
            }else{
                $TeachmeTutorDocument->document = $request->old_document;
            }
        $TeachmeTutorDocument->title = $request->title;
        $TeachmeTutorDocument->expiry_date = $request->expiry_date;
        $TeachmeTutorDocument->tutor_id = $user->id;
        $TeachmeTutorDocument->save();
        // Redirect back with success message
        return redirect('profile/'.encrypt(Auth::user()->id))->with(['success' => 'Document upload successfully.', 'document' => 'yes']);

    }

// editdocument
        if ($request->param == 'editdocument') {
        // Validate the request data
            $validatedData = $request->validate([
                'title' => 'required',
                'expiry_date' => 'required',
                'document' => 'nullable|file|mimes:pdf'
            ]);

        $TeachmeTutorDocument = TeachmeTutorDocument::find($request->document_id);
    // Handle image upload if needed
        if ($request->hasFile('document')) {
        Storage::delete('public/' . $TeachmeTutorDocument->document);
            $image = $request->file('document');
            $imagePath = $image->store('document', 'public');
            $TeachmeTutorDocument->document = $imagePath;
        }else{
            $TeachmeTutorDocument->document = $request->old_document;
        }

        $TeachmeTutorDocument->title = $request->title;
        $TeachmeTutorDocument->expiry_date = $request->expiry_date;
        $TeachmeTutorDocument->tutor_id = $user->id;
        $TeachmeTutorDocument->save();

        // Redirect back with success message
        return redirect('profile/'.encrypt(Auth::user()->id))->with(['success' => 'Document Updated successfully.', 'document' => 'yes']);
    }



// payments_card
        if ($request->param == 'payments_card') {
            $user = Auth::user();
            Stripe::setApiKey(env('STRIPE_SECRET'));
            try {
                // Tokenize the payment method
                $paymentMethod = \Stripe\PaymentMethod::create([
                    'type' => 'card',
                    'card' => [
                        'token' => $request->payment_method_id,
                    ],
                ]);

                // Update the default payment method
                $user->updateDefaultPaymentMethod($paymentMethod->id);

                return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Card added successfully.');
            } catch (\Exception $e) {
                // Handle any errors
                return redirect('profile/'.encrypt(Auth::user()->id))->with('error', $e->getMessage());

            }


            // Redirect back with success message
            return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Card added successfully.');
        }

        $user->save();

        if (Auth()->user()->type == 'admin') {
            return redirect('edit-profile/'.encrypt(Auth::user()->id))->with('success', 'Profile updated successfully');
        }
        return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Profile updated successfully');
    }


    public function del_data($type, $data_id)
    {
        if ($type == 'education') {
            TeachmeTutorEducation::where('id', $data_id)->delete();
        }

        if ($type == 'experience') {
            TeachmeTutorExperience::where('id', $data_id)->delete();
        }

        if ($type == 'document') {
            TeachmeTutorDocument::where('id', $data_id)->delete();
            return redirect()->back()->with(['success', ucfirst($type).' Deleted successfully', 'document' => 'yes']);
        }

        return redirect()->back()->with('success', ucfirst($type).' Deleted successfully');

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted successfully');
    }

    public function tutor_status(Request $request)
    {
        $type = $request->type;
        $status = $request->status;
        $user_id = $request->user_id;
        $logo = email_logo();
        $checkUser = User::find($user_id);
        if (!$checkUser) {
            return redirect()->back()->with('error', 'Tutor Not Found');
        }
        
        if ($type == 'approval') {
            if ($checkUser->approval_status == 0) {
                $checkUser->approval_status = $status;
                $checkUser->verification_status = 1;
                $checkUser->askforapproval = 'done';
                $checkUser->reject_status = 0;
                $checkUser->save();
                $msg = 'Profile Approved!';

                // email code (tutor)
                $user_type = $checkUser->role;
                $user_profile = url('profile/'.encrypt($checkUser->id));
                $html = view('emails.profile_approval.tutor_mail', compact('user_type','user_profile','logo'))->render();
                Resend::emails()->send([
                    'from' => 'TeachMe '.env('MAIL_FROM_ADDRESS'),
                    'to' => [$checkUser->email],
                    'subject' => 'Congratulations! Your Profile Approved!',
                    'html' => $html, 
                    // Include the reset link in the email content
                ]);
                // end email code
            }else{
                $checkUser->verification_status = 0;
                $checkUser->approval_status = $status;
                $checkUser->askforapproval = 'ask';
                $checkUser->reject_status = 1;
                $checkUser->save();
                $msg = 'Profile Approved!';

                $user_type = $checkUser->role;
                $user_profile = url('profile/'.encrypt($checkUser->id));
                $html = view('emails.profile_approval.tutor_mail', compact('user_type','user_profile','logo'))->render();
                Resend::emails()->send([
                    'from' => 'TeachMe '.env('MAIL_FROM_ADDRESS'),
                    'to' => [$checkUser->email],
                    'subject' => 'Unfortunately! Your Profile Reject!',
                    'html' => $html, 
                    // Include the reset link in the email content
                ]);
            }


        }

        if ($type == 'askapproval') {
            $checkUser->reject_status = 0;
            $checkUser->askforapproval = $status;
            $checkUser->save();
            $msg = 'Your profile has been submitted for approval. Once approved, you will be able to complete payment and your profile will be added to the TeachME platform.';

            // email code (admin)
                $user_type = $checkUser->role;
                $user_profile = url('profile/'.encrypt($checkUser->id));
                $html = view('emails.profile_approval.admin_mail', compact('user_type','user_profile','logo'))->render();
                Resend::emails()->send([
                    'from' => 'TeachMe '.env('MAIL_FROM_ADDRESS'),
                    'to' => [env('admin_mail')],
                    'subject' => 'New Profile for Approval',
                    'html' => $html, 
                    // Include the reset link in the email content
                ]);
            // end email code
        }

        return redirect()->back()->with('success', $msg);
    }


    public function reject_profile(Request $request)
    {
        $note = $request->note;
        $user_id = $request->user_id;
        $logo = email_logo();
        $checkUser = User::find($user_id);
        if (!$checkUser) {
            return redirect()->back()->with('error', 'Tutor Not Found');
        }
                $checkUser->verification_status = 0;
                $checkUser->approval_status = 0;
                $checkUser->askforapproval = 'ask';
                $checkUser->reject_status = 1;
                $checkUser->save();
                $msg = 'Profile Rejected!';

                $user_type = $checkUser->role;
                $user_profile = url('profile/'.encrypt($checkUser->id));
            $html = view('emails.profile_approval.tutor_rejection_mail', compact('user_type','user_profile','logo','note'))->render();
                Resend::emails()->send([
                    'from' => 'TeachMe '.env('MAIL_FROM_ADDRESS'),
                    'to' => [$checkUser->email],
                    'subject' => 'Unfortunately! Your Profile Reject!',
                    'html' => $html, 
                    // Include the reset link in the email content
                ]);

        return redirect()->back()->with('success', $msg);
    }

    public function check_mail($value='')
    {   

        $check_video_url = '';
        return view('emails.check_video', compact('check_video_url'));


        $token = 'abc';
        $user_type = 'tutor';
        $user_profile = 'tutor423432432423';
        $package_name = 'For Tutor';
        $start_date = \Carbon\Carbon::parse('04-18-2024')->format('d-m-Y');
        $end_date = \Carbon\Carbon::parse('04-18-2024')->format('d-m-Y');
        $amount = 100;
        
        return view('emails.subscriptionEmail', compact(
            'token',
            'user_type',
            'user_profile',
            'package_name',
            'start_date',
            'end_date',
            'amount',
        ));
    }
}



