<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Crypt;

class AccountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $username = \Auth::user()->name;
        $user = DB::table('users')->where([
            ['name', '=', $username],
        ])->first();
        $useremail = $user->email;
        return view('account.account', ['useremail' => $useremail]);
    }

    function update_account(Request $request)
    {
        $email = $request->email;
        $current_word = $request->current_password;
        $new_word = $request->new_password;
        $confirm_word = $request->confirm_password;

        $username = \Auth::user()->name;
        $user = DB::table('users')->where([
            ['name', '=', $username],
        ])->first();
        $useremail = $user->email;
        $userpassword_crypted = $user->password;
        $old_password = Crypt::decrypt($userpassword_crypted);

        if($current_word == $old_password)
        {
            if($new_word == $confirm_word)
            {
                DB::table('users')->where('name', $username)->update(
                    array(
                        'email' => $request->email,
                        'password' => Crypt::encrypt($request->new_word)
                ));
            }
        }

    }

    function account_setting()
    {
        $username = \Auth::user()->name;
        $projects = DB::table('projects')->where([
            ['username', '=', $username],
        ])->get();
        $num_projects = count($projects);
        $pages = DB::table('pages')->where([
            ['username', '=', $username],
        ])->get();
        $num_pages = count($pages);
        $images = DB::table('images')->where([
            ['username', '=', $username],
        ])->get();
        $num_images = count($images);

        $account = DB::table('accounts')->where([
            ['username', '=', $username],
        ])->first();

        return view('setting.setting', ['num_projects' => $num_projects, 'num_pages' => $num_pages, 'num_images' => $num_images, 'account' => $account]);
    }

    function setting_save(Request $request)
    {
        $username = \Auth::user()->name;

        $this->validate($request, [
            'btn_logo' => 'image',
            'btn_favicon' => 'image',
        ]);

        $file_logo = Input::file('btn_logo');
        $file_favicon = Input::file('btn_favicon');

        $logo_name = "";
        $favicon_name = "";
        if($request->btn_logo)
        {
            $logo_name = $username."-".time().$file_logo->getClientOriginalName();
            $request->session()->put('image_name', $file_logo->getClientOriginalName());
            $request->btn_logo->move(public_path('logo_image'), $logo_name);
            DB::table('accounts')->where('username', $username)->update(
                array(
                    'logo_image' => $logo_name,
            ));
        }

        if($request->btn_favicon)
        {
            $favicon_name = $username."-".time().$file_favicon->getClientOriginalName();
            $request->session()->put('image_name', $file_favicon->getClientOriginalName());
            $request->btn_favicon->move(public_path('favicon_image'), $favicon_name);
            DB::table('accounts')->where('username', $username)->update(
                array(
                    'favicon_image' => $favicon_name,
            ));
        }

        $flag_available = false;
        if($request->available)
        {
            $flag_available = true;
        }

        $flag_show_domain = false;
        if($request->show_domain)
        {
            $flag_show_domain = true;
        }

        DB::table('accounts')->where('username', $username)->update(
            array(
                'site_title' => $request->site_title,
                'portfolio_url' => $request->portfolio_url,
                'custom_domain' => $request->custom_domain,
                'password_protected' => $request->password_protected,
                'meta_title' => $request->meta_description,
                'meta_description' => $request->meta_description,
                'google_analytics' => $request->google_analytics,
                'available' => $flag_available,
                'show_domain' => $flag_show_domain,
        ));

        return redirect()->action(
            'HomeController@index'
        );

    }

    function deletelogo(Request $request)
    {
        $username = \Auth::user()->name;
        DB::table('accounts')->where('username', $username)->update(
            array(
                'logo_image' => "",
        ));
        return "ok";
    }

    function deletefavicon(Request $request)
    {
        $username = \Auth::user()->name;
        DB::table('accounts')->where('username', $username)->update(
            array(
                'favicon_image' => "",
        ));
        return "ok";
    }

    function deleteaccount(Request $request)
    {
        $username = \Auth::user()->name;
        DB::table('accounts')->where('username', $username)->delete();
        DB::table('users')->where('name', $username)->delete();

        return "ok";
    }

}
