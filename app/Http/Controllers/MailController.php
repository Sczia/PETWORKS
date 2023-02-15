<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\reply;
use App\Mail\verify;
use App\Models\Owner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function reply(Request $request)
    {
        $details = [
            'title' => 'Message from Municipal Jail of Los Banos',
            'body' => $request->input('reply')
        ];
        /*    Mail::to($request->input('email'))->send(new reply($details)); */
        return back();
    }

    public static function sendVerificationEmail($name, $recipient, $url)
    {
        $data = [
            'name' => $name,
            'url' => $url
        ];
        Mail::to($recipient)->send(new verify($data));
    }
    public static function verifyEmail(Request $request)
    {
        $email = $request->token;
        try {
            $owner = Owner::where('email', '=', $email)->firstOrFail();
            $owner->update([
                'hasVerifiedEmail' => 1
            ]);
            alert()->success('Success', 'Your email address has been successfully validated!');
            return redirect()->route('appointment.index');
        } catch (ModelNotFoundException $th) {
            // If the verification code or student is not found, show an error message
            alert()->error('Error', 'Invalid Code');
            return redirect()->route('appointment.index');
        }
    }
}
