<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class UserController extends Controller
{
    /**
     * Checks if given password is unique.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {
        Log::info('Creating User');
        $username = $request->get('username');
        $password = $request->get('password');
        $password2 = $request->get('password2');
        $email = $request->get('emailAddress');
        $phone = $request->get('phoneNumber');
        $librarian = $request->get('librarian');

        if(ctype_alnum($username) && strlen($password) != 0 && $password == $password2 && filter_var($email, FILTER_VALIDATE_EMAIL) && isValidPhone($phone)) {
            Log::info('User Info is Valid');
            User::create([
                'name' => $username,
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
                'librarian' => $librarian,
            ]);
            return view('login');
        } else {
            Log::info('User Info is not Valid');
        }
    }

    public function isValidPhone($phone) {
        if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
            return true;
        }
        if(preg_match("/^[0-9]{10}$/", $phone)) {
            return true;
        }
        return false;
    }
}
