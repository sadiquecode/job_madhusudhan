<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GlobalDetails\Academic;
use App\Models\GlobalDetails\Non_academic;
use App\Models\GlobalDetails\Expertise;
use App\Models\GlobalDetails\Speciality;
use App\Models\GlobalDetails\Subject;
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
        return view('main.index', get_defined_vars());
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
