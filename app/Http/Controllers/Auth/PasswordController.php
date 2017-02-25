<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = '/admin/project';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth')->only(['resetAuthenticated', 'getResetAuthenticatedView']);
        $this->middleware('guest')->except(['resetAuthenticated', 'getResetAuthenticatedView']);
    }

    public function getResetAuthenticatedView(Request $request)
    {

        $username = \Auth::user()->name;
        $user = DB::table('users')->where([
            ['name', '=', $username],
        ])->first();
        $token = $user->remember_token;

        return view('auth.passwords.reset', ['token' => $token, 'email' => $user->email]);
    }

    public function resetAuthenticated(Request $request)
    {
        //echo "ok";
        $this->validate($request, ['password' => 'required|confirmed|min:6']);
        $credentials = $request->only('password', 'password_confirmation');
        $credentials['email'] = $request->email;

        $user = auth()->user();
        //$username = \Auth::user()->name;
        $user->update(['email' => $credentials['email'], 'password' => bcrypt($credentials['password'])]);
        /*
        resetPassword($user, $credentials['password']);
        DB::table('users')->where('name', $username)->update(
            array(
                'password' => bcrypt($credentials['password'])
        ));
        */
        return $user->save() ? $this->getResetSuccessResponse(Password::PASSWORD_RESET)
                             : 'Error';
    }

    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);

        $user->save();

        auth()->guard($this->getGuard())->login($user);
    }

}
