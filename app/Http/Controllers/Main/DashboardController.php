<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GlobalDetails\Academic;
use App\Models\GlobalDetails\Non_academic;
use App\Models\GlobalDetails\Expertise;
use App\Models\GlobalDetails\Speciality;
use App\Models\GlobalDetails\Subject;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // $total_users = DB::table('users')->where('role','student')->count();
        $academic = Academic::where('status','active')->get();
        $non_academic = Non_academic::where('status','active')->get();
        $expertise = Expertise::where('status','active')->get();
        $speciality = Speciality::where('status','active')->get();
        $subject = Subject::where('status','active')->get();

        // $combined = $academic->merge($non_academic);
        // dd($combined);
        return view('main.index', get_defined_vars());
    }

    
    public function dashboard()
    {
        $user_id = auth()->id();
        $isAdmin = auth()->user()->type === 'admin';
        if (!$isAdmin) {
            return redirect('/login-admin');
        }
        
                // Get all applications
        $allApplicationsCount = Application::count();

        // Get applications created this month
        $monthlyApplicationsCount = Application::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Get applications created today
        $todayApplicationsCount = Application::whereDate('created_at', Carbon::today())->count();



        return view('main.dashboard', get_defined_vars());
    }

    public function submit_application(Request $request)
    {

        // dd($request->all());
            // Validate the request data
            $validatedData = $request->validate([
                'applicant_name' => 'nullable|string|max:255',
                'father_name' => 'nullable|string|max:255',
                'date' => 'nullable|date',
                'caste' => 'nullable|string|max:255',
                'martial_status' => 'nullable|string|max:255',
                'language' => 'nullable|string|max:255',
                'qualification' => 'nullable|string|max:255',
                'address' => 'nullable|string',
                'working_exp' => 'nullable|string|max:255',
                'experience_years' => 'nullable|string|max:255',
                'salary_expected' => 'nullable|string|max:255',
                'salary_drawn' => 'nullable|string|max:255',
                'email' => 'nullable|string|email|max:255',
                'number' => 'nullable|string|max:255',
                'democlass' => 'nullable|string|max:255',
                'referred_by' => 'nullable|in:newspaper,socialmedia,friends,others',
                'profile_img' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // updated for file upload
                'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // updated for file upload
                'category' => 'required|string', // This field will hold either 'academic_{id}' or 'non_academic_{id}'
                'speciality' => 'nullable|exists:speciality,id',
                'expertise' => 'nullable|exists:expertise,id',
                'subjects' => 'nullable|exists:subjects,id',
            ]);
    
            // Separate category into academic and non_academic
            $academic_id = null;
            $non_academic_id = null;
    
            if (str_starts_with($validatedData['category'], 'academic_')) {
                $academic_id = str_replace('academic_', '', $validatedData['category']);
            } elseif (str_starts_with($validatedData['category'], 'non_academic_')) {
                $non_academic_id = str_replace('non_academic_', '', $validatedData['category']);
            }
    

                    
        if ($request->hasFile('profile_img')) {
            $profile_img = $request->file('profile_img')->store('profile_images');
        }
    
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv')->store('cv_files');
        }

            // Create the application
            $application = new Application([
                'applicant_name' => $validatedData['applicant_name'] ?? null,
                'father_name' => $validatedData['father_name'] ?? null,
                'date' => $validatedData['date'] ?? null,
                'caste' => $validatedData['caste'] ?? null,
                'martial_status' => $validatedData['martial_status'] ?? null,
                'language' => $validatedData['language'] ?? null,
                'qualification' => $validatedData['qualification'] ?? null,
                'address' => $validatedData['address'] ?? null,
                'working_exp' => $validatedData['working_exp'] ?? null,
                'experience_years' => $validatedData['experience_years'] ?? null,
                'salary_expected' => $validatedData['salary_expected'] ?? null,
                'salary_drawn' => $validatedData['salary_drawn'] ?? null,
                'email' => $validatedData['email'] ?? null,
                'number' => $validatedData['number'] ?? null,
                'democlass' => $validatedData['democlass'] ?? null,
                'referredBy' => $validatedData['referred_by'] ?? null,
                'profile_img' => $profile_img,
                'cv' => $cv,
                'academic_id' => $academic_id,
                'non_academic_id' => $non_academic_id,
                'speciality_id' => $validatedData['speciality'] ?? null,
                'expertise_id' => $validatedData['expertise'] ?? null,
                'subject_id' => $validatedData['subjects'] ?? null,
            ]);
    
            // Save the application to the database
            $application->save();

        return redirect()->route('thank-you')->with('success', 'Application submitted successfully!');
    }
    

    public function thank_you()
    {
        // $total_users = DB::table('users')->where('role','student')->count();

        return view('main.thank_you', get_defined_vars());
    }

    public function filter_page()
    {
        $applications = Application::all();
        $academics = Academic::all();
        $nonAcademics = Non_academic::all();
        $expertises = Expertise::all();
        $specialities = Speciality::all();
        $subjects = Subject::all();
        return view('main.filter_data', get_defined_vars());
    }

    public function application_details($app_id)
    {
        // $application = Application::where('id', $app_id)->first();
        $application = Application::with(['academic', 'nonAcademic', 'expertise', 'speciality', 'subject'])
        ->where('id', $app_id)
        ->first();

        // dd($application);
        return view('main.application_details', get_defined_vars());
    }

    

}
