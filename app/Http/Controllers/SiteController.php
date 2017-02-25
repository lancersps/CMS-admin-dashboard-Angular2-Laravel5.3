<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class SiteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index($username)
    {
        $user_account = DB::table('accounts')->where([
            ['username', '=', $username],
        ])->first();
        $theme_name = $user_account->template_name;



        return view('site.site', ['header_str' => $header_str, 'js_str' => $js_str]);
    }

}
