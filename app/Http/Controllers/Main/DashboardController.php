<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $total_users = DB::table('users')->where('role','student')->count();

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
