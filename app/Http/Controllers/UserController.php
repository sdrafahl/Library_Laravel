<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $data = $request->all();
        $data = json_decode(array_keys($data)[0]);
        $username = $data->username;
        $password = $data->password;
        $password2 = $data->password2;
        $email = $data->emailAddress;
        $phone = $data->phoneNumber;
        $librarian = $data->librarian;

        Log::info(UserController::validateEMAIL($email));

        if(ctype_alnum($username) && strlen($password) != 0 && $password == $password2 && UserController::validateEMAIL($email) && UserController::isValidPhone($phone)) {
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

    public function validateEMAIL($email) {
        if(sizeof(Users::where('email','=',$email)->get()) > 0) {
            return;
        }
        if($email[0] == '@') {
            return false;
        }
        $state = 0;
        for($i = 0; $i < strlen($email); $i++) {
            $ch = $email[$i];
            if($ch == "@" && $state == 0) {
                $state = 1;
            }

            if($ch != "@" && $state == 1) {
                $state = 2;
            }

            if($ch == "@" && $state == 2) {
                return false;
            }
        }
        return $state == 2;
    }
}
