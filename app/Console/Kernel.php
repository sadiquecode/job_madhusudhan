<?php

namespace App\Console;

use Resend\Laravel\Facades\Resend;
use App\Models\GlobalDetails\TeachmeTutorDocument;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

    // $schedule->command('inspire')->hourly();
    protected function schedule(Schedule $schedule): void
    {

        // Send email before one week of expiry
        $schedule->call(function () {
            $documentsExpiringSoon = TeachmeTutorDocument::where('email_status', 0)->whereDate('expiry_date', now()->addWeek())
                ->get();

            $logo = email_logo();
    
            foreach ($documentsExpiringSoon as $document) {
                $checkUser = User::find($document->tutor_id);
                $expiry_date = Carbon::createFromFormat('Y-m-d', $document->expiry_date)->format('d-m-Y');
                $user_profile = url('profile/'.encrypt($checkUser->id));
                $html = view('emails.profile_approval.expiry_reminder_mail', compact('user_profile','logo','expiry_date'))->render();
                Resend::emails()->send([
                    'from' => 'TeachMe '.env('MAIL_FROM_ADDRESS'),
                    'to' => [$checkUser->email],
                    'subject' => 'License Expiry Reminder',
                    'html' => $html, 
                    // Include the reset link in the email content
                ]);

                // update email status
                $TeachmeTutorDocument = TeachmeTutorDocument::find($document->id);
                $TeachmeTutorDocument->email_status = 1;
                $TeachmeTutorDocument->save();
            }
            
            // dailyAt('17:09');
            // everyFiveMinutes
        })->everyFiveMinutes();

        // Send email on expiry date
        $schedule->call(function () {
            $documentsExpiredToday = TeachmeTutorDocument::where('expiry_status', 0)->whereDate('expiry_date', now())
                ->get();

                $logo = email_logo();
            foreach ($documentsExpiredToday as $document) {
                $checkUser = User::find($document->tutor_id);
                $user_profile = url('profile/'.encrypt($checkUser->id));
                $html = view('emails.profile_approval.expiry_mail', compact('user_profile','logo'))->render();
                Resend::emails()->send([
                    'from' => 'TeachMe '.env('MAIL_FROM_ADDRESS'),
                    'to' => [$checkUser->email],
                    'subject' => 'License Expired',
                    'html' => $html, 
                    // Include the reset link in the email content
                ]);

                // update expiry status
                $TeachmeTutorDocument = TeachmeTutorDocument::find($document->id);
                $TeachmeTutorDocument->expiry_status = 1;
                $TeachmeTutorDocument->save();

                $checkUser->verification_status = 0;
                $checkUser->approval_status = 0;
                $checkUser->askforapproval = 'ask';
                $checkUser->reject_status = 0;
                $checkUser->save();
            }
        })->everyFiveMinutes();
    
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
