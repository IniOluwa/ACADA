<?php

namespace ACADA\Http\Controllers;

use ACADA\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

// Edit Profile Controller Class
class EditProfileController extends Controller
{
    // Function to update user profile
    public function updateProfile(Request $request)
    {
      // print_r($request->input('newEmail'));
      $newName = $request->input('newName');
      $newEmail = $request->input('newEmail');
      $newPassword = $request->input('newPassword');
      $confirmNewPassword = $request->input('confirmNewPassword');

      // Function to match new passwords
      function doPasswordsMatch($password, $confirmedPassword)
      {
        if ($password == $confirmedPassword) {
          return True;
        } else {
          return False;
        }
      }

      // Updating database with new user data
      if (doPasswordsMatch($newPassword, $confirmNewPassword)) {
        if ($request->hasFile('avatar')) {
          # code...
          $avatar = $request->file('avatar');
          $avatarPath = $avatar->path();
          $avatarType = $avatar->getMimeType();
          $avatarName = $avatar->getClientOriginalName();
          $avatarExtension = $avatar->guessExtension();
          // $avatarNewPath = $avatar->store('images/avatars');
          $avatarNewPath = $avatar->move('images/avatars', $avatarName);
          // print_r("{$avatarPath} + {$avatarExtension} + {$avatarType} + {$avatarName} + {$avatarNewPath}");
        }

        $newPassword = bcrypt($newPassword);
        $id = $request->input('user_id');
        $update = DB::update("UPDATE users SET name='{$newName}', email='{$newEmail}', password='{$newPassword}', avatar='{$avatarNewPath}' WHERE id={$id}");
        Session::flash('post-flash', ' 1 new post added !');
        return view('home');
      }

      // return back();
    }
}
