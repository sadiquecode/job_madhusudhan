<?php
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;




if (!function_exists('email_logo')) {
    function email_logo()
    {
        return url('public/theme_assets/images/logo_file.png');
    }
}

if (!function_exists('review_count')) {
    function review_count($student_id, $tutor_id)
    {
        // return DB::table('teachme_reviews')->where('student_id',$student_id)->where('tutor_id',$tutor_id)->count();
    }
}
