<?php
namespace App\Http\Controllers\Views\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\PasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class PasswordMailController extends Controller
{

    /**
     * envoi the given order.
     *
     * @param  Request  $request
     * @return Response
     */
    public function envoi(Request $request, $id)
    {
        $passwordMail = new \stdClass();
        $passwordMail->sender = 'Boukarou';
        $passwordMail->receiver = $request->user();
        $passwordMail = User::findOrFail($id);

        Mail::to($request->user())->send(new PasswordMail($passwordMail))
    }
}
