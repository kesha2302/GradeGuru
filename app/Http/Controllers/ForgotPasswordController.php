<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\ResetPasswordtoken;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{

    public function forgotpasswordload()
    {
        return view('ClientView.forgotpassword');
    }

    public function forgotpassword(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $token = Str::random(20);
                $domain = URL::to('/');
                $url = $domain . '/reset-password?token=' . $token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = 'Please click on the below link to reset your password.';

                Mail::send('ClientView.forgotmail', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });

                $dateTime = Carbon::now();
                ResetPasswordtoken::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $dateTime
                    ]
                );

                return back()->with('success', 'Please check your email to reset your password!');
            } else {
                return back()->with('error', 'Email does not exist!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function resetpasswordload(Request $request)
    {

        $resetdata = ResetPasswordtoken::where('token', $request->token)->first();

        Log::info("Resetdata= " . json_encode($resetdata));

        if ($resetdata) {

            $email = $resetdata->email;
            Log::info("Email= " . $email);

            $user = User::where('email', $resetdata->email)->first();
            Log::info("user= " . json_encode($user));

            return view('ClientView.resetpassword', compact('user'));
        } else {
            return view('ClientView.errorpage');
        }
    }


    public function resetpassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);


        $user = User::find($request->Id);

        if (!$user) {
            return back()->with('error', 'User not found.');
        }
        Log::info("Customer_id= " . $request->Id);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Your password has been reset successfully. Please log in.');
    }
}
