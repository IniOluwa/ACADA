<?php

namespace ACADA\Http\Controllers\Auth;

use ACADA\User;
use Auth;
use Socialite;
use ACADA\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $redirectPath = 'home';

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
          //this is a loop
            return redirect('auth/facebook');
        }

        $authUser = $this->findOrCreateFaceboookUser($user);

        Auth::login($authUser, true);

        return redirect()->route('home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateFaceboookUser($facebookUser)
    {
        $authUser = User::where('social_id', $facebookUser->id)->first();

        if ($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'password' => $facebookUser->id,
            'social_id' => $facebookUser->id,
            'avatar' => $facebookUser->avatar
        ]);
    }

    // public function getSocialRedirect( $provider )
    // {
    //
    //     $providerKey = Config::get('services.' . $provider);
    //
    //     if (empty($providerKey)) {
    //
    //         return view('pages.status')
    //             ->with('error','No such provider');
    //
    //     }
    //
    //     return Socialite::driver( $provider )->redirect();
    //
    // }

    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleProviderCallback()
    {
      try {
          $user = Socialite::driver('google')->user();
      } catch (Exception $e) {
        //this is a loop
          return redirect('auth/google');
      }

      $authUser = $this->findOrCreateGoogleUser($user);

      Auth::login($authUser, true);

      return redirect()->route('home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $googleUser
     * @return User
     */
    private function findOrCreateGoogleUser($googleUser)
    {
        $authUser = User::where('social_id', $googleUser->id)->first();

        if ($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => $googleUser->id,
            'social_id' => $googleUser->id,
            'avatar' => $googleUser->avatar
        ]);
    }
}
