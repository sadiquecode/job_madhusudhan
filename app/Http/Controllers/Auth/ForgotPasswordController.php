<?php

namespace App\Http\Controllers\Auth;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Hash;
    use Illuminate\Support\Str;
    use Mail;
    use Resend\Laravel\Facades\Resend;
    use Illuminate\Support\Facades\Password;
    use Illuminate\Auth\Events\PasswordReset;
    use Illuminate\Support\Facades\URL;
    use App\Models\User;


class ForgotPasswordController extends Controller
{

    public function forgotpassword()
    {   
        $title = 'Forgot Password Page';
        $description = 'This is Forgot Password Page';
        $image = '';
        return view('auth.forgot-password', get_defined_vars());
    }

    public function sendResetLinkEmail(Request $request)
    {
             // Find the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Handle case where user is not found
            return redirect()->back()->withErrors(['email' => 'We are not able to find any user registered with this email']);
        } 

            // Generate a password reset token for the user
            $token = $this->generateCustomToken($user);

            // Generate the reset link using the token
            $resetLink = URL::signedRoute('showResetForm', ['token' => $token]);

            $user_type = ucfirst($user->role);
            $logo = email_logo();
            // Send the password reset link via email
            $html = view('emails.ForgetEmail', compact('resetLink','user_type','logo'))->render();
            Resend::emails()->send([
                'from' => 'TeachMe '.env('MAIL_FROM_ADDRESS'),
                'to' => [$request->email],
                'subject' => 'Password Reset Link',
                'html' => $html, // Include the reset link in the email content
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Password reset link sent successfully');
    }



        public function showResetForm($token)
    {
        $title = 'Reset Password Page';
        $description = 'This is Reset Password  Page';
        $image = '';
        $token = $token;
        return view('auth.reset-password', get_defined_vars());
    }



        public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
        // Handle case where user is not found
            return back()->withErrors(['email' => 'We are not able to find any user registered with this email']);
        }

        // Reset the user's password
        $user->password = bcrypt($request->password);
        $user->save();

        // Fire an event indicating that the password was reset
        event(new PasswordReset($user));

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('status', 'Password reset successfully.');
    }


    private function generateCustomToken($user)
    {
        // Replace this with your own token generation logic
        return md5($user->email . time());
    }

}
