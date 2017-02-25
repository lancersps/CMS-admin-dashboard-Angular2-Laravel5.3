<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class TemplateController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $templates = DB::table('templates')->where([
            ['is_active', '=', true],
        ])->get();
        $username = \Auth::user()->name;
        $account = DB::table('accounts')->where([
            ['username', '=', $username],
        ])->first();
        return view('template.template', ['templates' => $templates, 'account' => $account]);
    }

    function activate_template(Request $request)
    {
        $template_id = $request->template_id;
        $template = DB::table('templates')->where([
            ['id', '=', $template_id],
        ])->first();
        $template_name = $template->title;
        $username = \Auth::user()->name;
        DB::table('accounts')->where('username', $username)->update(
             array(
                 'template_name' => $template_name,
             )
        );

        return redirect()->action(
            'TemplateController@index'
        );

    }

}
