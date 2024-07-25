<?php
 
namespace App\Http\Controllers\Auth;

use App\Models\User;
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
use DB;
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
        $user = User::find($userId);

        // dd($user);
        $view = 'auth.profile';
        $head = 'Edit Profile';
        $title = 'Edit Profile Page';
        $description = 'This is Edit Profile Page';
        $image = '';
        return view($view, compact(
            'user',
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
                'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20'
            ]);



            $user->name = $validatedData['name'];
            $user->lname = $validatedData['lname'];
            $user->phone = $validatedData['phone'];

if ($request->hasFile('profile_pic')) {

        // Attempt to delete the old profile picture
    Storage::delete('public/' . $user->profile_pic);
    // Get the uploaded image
    $image = $request->file('profile_pic');
    
    // Store the original image
    $imagePath = $image->store('user_profile', 'public');
    
    // Create a blurred version of the image
    $imageResource = imagecreatefromstring(file_get_contents('storage/app/public/' . $imagePath));
    
    $smallImageResource = imagescale($imageResource, 10, 10);

    // Free memory
    imagedestroy($imageResource);
    imagedestroy($smallImageResource);
    
    // Update the user's profile pic and blurred profile pic paths
    $user->profile_pic = $imagePath;
    
} else {
    $user->profile_pic = $request->old_profile_pic;
}





        $user->save();

        if (Auth()->user()->type == 'admin') {
            return redirect('edit-profile/'.encrypt(Auth::user()->id))->with('success', 'Profile updated successfully');
        }
        return redirect('profile/'.encrypt(Auth::user()->id))->with('success', 'Profile updated successfully');
    }
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



