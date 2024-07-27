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

    public function submit_application(Request $request)
    {
        $request->validate([
            'applicant_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'date' => 'required|date',
            'caste' => 'required|string|max:255',
            'martial_status' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            'working_exp' => 'required|string|max:255',
            'experience_years' => 'required|string|max:255',
            'salary_expected' => 'required|string|max:255',
            'salary_drawn' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|numeric',
            'democlass' => 'nullable|string|max:255',
            'referredBy' => 'required|in:newspaper,socialmedia,friends,others',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'academic' => 'array|exists:academic,id',
            'non_academic' => 'array|exists:non_academic,id',
            'specialities' => 'array|exists:speciality,id',
            'expertise' => 'array|exists:expertise,id',
            'subject' => 'array|exists:subjects,id',
        ]);
    
        $application = new Application($request->except(['academic', 'non_academic', 'specialities', 'expertise', 'subject', 'profile_img', 'cv']));
        
        if ($request->hasFile('profile_img')) {
            $application->profile_img = $request->file('profile_img')->store('profile_images');
        }
    
        if ($request->hasFile('cv')) {
            $application->cv = $request->file('cv')->store('cv_files');
        }
    
        $application->save();

        $application->academics()->sync($request->input('academic', []));
        $application->nonAcademics()->sync($request->input('non_academic', []));
        $application->specialities()->sync($request->input('specialities', []));
        $application->expertises()->sync($request->input('expertise', []));
        $application->subjects()->sync($request->input('subject', []));

        return redirect()->route('thank_you')->with('success', 'Application submitted successfully!');
    }
    

    public function thank_you()
    {
        // $total_users = DB::table('users')->where('role','student')->count();

        return view('main.thank_you', get_defined_vars());
    }

    public function filter_page()
    {
        // $total_users = DB::table('users')->where('role','student')->count();

        return view('main.filter_data', get_defined_vars());
    }

    public function profile_page()
    {
        // $total_users = DB::table('users')->where('role','student')->count();

        return view('main.profile', get_defined_vars());
    }

    public function dashboard()
    {
        $user_id = auth()->id();
        $isAdmin = auth()->user()->type === 'admin';
        if (!$isAdmin) {
            return redirect('/login-admin');
        }
        // $total_users = DB::table('users')->where('role','student')->count();

        return view('main.dashboard', get_defined_vars());
    }
    

}
