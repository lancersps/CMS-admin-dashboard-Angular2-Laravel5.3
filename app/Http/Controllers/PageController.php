<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class PageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    function index()
    {
        $flag_page = 0;
        $username = \Auth::user()->name;
        $pages = DB::table('pages')->where([
            ['username', '=', $username],
        ])->get();
        $num_pages = count($pages);
        $error_message = "";
        if($num_pages > 10)
        {
            DB::table('pages')->where([
                ['image_name', '=', $image_name],
            ])->delete();
            $error_message = "Your pages are out of limit.";
            $pages = DB::table('pages')->where([
                ['username', '=', $username],
            ])->get();
        }
        if($pages)
        {
            $flag_page = 1;
        }
        return view('page.page', ['flag_page' => $flag_page, 'pages' => $pages, 'error_message' => $error_message]);
    }

    function new_index()
    {
        return view('page.new');
    }

    function save_page(Request $request)
    {

        $is_active = $request->is_active;
        $title = $request->title;
        $description = $request->description;
        $meta_title = $request->meta_title;
        $meta_description = $request->meta_description;
        $permalink = $request->permalink;
        $password_protected = $request->password;
        $menu_label = $request->menu_label;
        $image_name = "";

        $flag_page = 0;

        $username = \Auth::user()->name;

        $this->validate($request, [
            'image_file' => 'required|image',
        ]);

        // you have to set up the upload_file_maxsize 10 M.
        // the url is /etc/php5/fpm/php.ini
        $file = Input::file('image_file');
        if($request->session()->get('image_name') != $file->getClientOriginalName())
        {
            $image_name = $username."-".time().$file->getClientOriginalName();
            $request->session()->put('image_name', $file->getClientOriginalName());
            $request->image_file->move(public_path('page_image'), $image_name);
        }
        else {
            $pages = DB::table('pages')->where([
                ['username', '=', $username],
            ])->get();
            $num_pages = count($pages);
            $error_message = "";
            if($num_pages > 10)
            {
                DB::table('pages')->where([
                    ['image_name', '=', $image_name],
                ])->delete();
                $error_message = "Your pages are out of limit.";
                $pages = DB::table('pages')->where([
                    ['username', '=', $username],
                ])->get();
            }
            if($pages)
            {
                $flag_page = 1;
            }
            return view('page.page', ['flag_page' => $flag_page, 'pages' => $pages, 'error_message' => $error_message]);
        }

        $active = false;
        if($is_active == "on")
            $active = true;
        if($title == "")
            $title = "Untitled";

        DB::table('pages')->insert(
             array(
                 'title' => $title,
                 'description' => $description,
                 'meta_title' => $meta_title,
                 'meta_description' => $meta_description,
                 'image_name' => $image_name,
                 'permalink' => $permalink,
                 'password_protected' => $password_protected,
                 'nav_menu_label' => $menu_label,
                 'is_active' => $active,
                 'username' => $username,
             )
        );


        $pages = DB::table('pages')->where([
            ['username', '=', $username],
        ])->get();
        $num_pages = count($pages);
        $error_message = "";
        if($num_pages > 10)
        {
            DB::table('pages')->where([
                ['image_name', '=', $image_name],
            ])->delete();
            $error_message = "Your pages are out of limit.";
            $pages = DB::table('pages')->where([
                ['username', '=', $username],
            ])->get();
        }
        if($pages)
        {
            $flag_page = 1;
        }
        return view('page.page', ['flag_page' => $flag_page, 'pages' => $pages, 'error_message' =>     $error_message]);

    }


    function onoff_page(Request $request)
    {
        $id = $request->id;
        $return_flag = "On";
        $page = DB::table('pages')->where([
            ['id', '=', $id],
        ])->first();

        if($page->is_active == 1)
        {
            DB::table('pages')->where('id', $id)->update(array('is_active' => 0));
            $return_flag = "On";
        }
        else {
            DB::table('pages')->where('id', $id)->update(array('is_active' => 1));
            $return_flag = "Off";
        }

        return $return_flag;
    }

    function delete_page(Request $request)
    {
        $id = $request->id;
        $username = \Auth::user()->name;
        DB::table('pages')->where('id',$id)->delete();
        $pages = DB::table('pages')->where([
            ['username', '=', $username],
        ])->get();
        $num_pages = count($pages);
        return $num_pages;
    }


    function update_page(Request $request, $id)
    {
        $username = \Auth::user()->name;
        $request->session()->put('page_id', $id);

        $page = DB::table('pages')->where([
            ['id', '=', $id],
        ])->first();

        //echo $request->session()->get('project_id');
        return view('page.update', ['page' => $page]);

    }

    function delete_update_page($id)
    {
        $id = $id;
        $username = \Auth::user()->name;
        DB::table('pages')->where('id',$id)->delete();

        return Redirect::to('/admin/page');

    }

    function update_save_page(Request $request)
    {
        $id = $request->page_id;

        $flag_page = 0;

        $username = \Auth::user()->name;

        $this->validate($request, [
            'image_file' => 'required|image',
        ]);
        $image_name = "";
        // you have to set up the upload_file_maxsize 10 M.
        // the url is /etc/php5/fpm/php.ini
        $file = Input::file('image_file');
        if($request->session()->get('image_name') != $file->getClientOriginalName())
        {
            $image_name = $username."-".time().$file->getClientOriginalName();
            $request->session()->put('image_name', $file->getClientOriginalName());
            $request->image_file->move(public_path('page_image'), $image_name);
        }
        else {
            $pages = DB::table('pages')->where([
                ['username', '=', $username],
            ])->get();
            $num_pages = count($pages);
            $error_message = "";
            if($num_pages > 10)
            {
                DB::table('pages')->where([
                    ['image_name', '=', $image_name],
                ])->delete();
                $error_message = "Your pages are out of limit.";
                $pages = DB::table('pages')->where([
                    ['username', '=', $username],
                ])->get();
            }
            if($pages)
            {
                $flag_page = 1;
            }
            return view('page.page', ['flag_page' => $flag_page, 'pages' => $pages, 'error_message' => $error_message]);
        }


        DB::table('pages')->where('id', $id)->update(
             array(
                 'title' => $request->title,
                 'description' => $request->description,
                 'meta_title' => $request->meta_title,
                 'meta_description' => $request->meta_description,
                 'image_name' => $image_name,
                 'permalink' => $request->permalink,
                 'password_protected' => $request->password_protected,
                 'nav_menu_label' => $request->menu_label,
             )
        );


        $pages = DB::table('pages')->where([
            ['username', '=', $username],
        ])->get();
        $num_pages = count($pages);
        $error_message = "";
        if($num_pages > 10)
        {
            DB::table('pages')->where([
                ['image_name', '=', $image_name],
            ])->delete();
            $error_message = "Your pages are out of limit.";
            $pages = DB::table('pages')->where([
                ['username', '=', $username],
            ])->get();
        }
        if($pages)
        {
            $flag_page = 1;
        }
        return view('page.page', ['flag_page' => $flag_page, 'pages' => $pages, 'error_message' =>     $error_message]);

    }

}
