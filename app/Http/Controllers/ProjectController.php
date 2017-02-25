<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index_new()
    {
        return view('project.new');
    }


    function save_project(Request $request)
    {

        $is_active = $request->is_active;
        $title = $request->title;
        $description = $request->description;
        $meta_title = $request->meta_title;
        $meta_description = $request->meta_description;
        $date = $request->date;
        $client = $request->client;
        $role = $request->role;
        $permalink = $request->permalink;
        $tags = $request->tags;
        $password_protected = $request->password;
        $project_external_url = $request->external_url;
        $image_name = "";
        $flag_project = 0;

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
            $request->image_file->move(public_path('project_image'), $image_name);
        }
        else {
            $projects = DB::table('projects')->where([
                ['username', '=', $username],
            ])->get();
            $num_projects = count($projects);
            $error_message = "";
            if($num_projects > 10)
            {
                DB::table('projects')->where([
                    ['img_name', '=', $image_name],
                ])->delete();
                $error_message = "Your projects are out of limit.";
                $projects = DB::table('projects')->where([
                    ['username', '=', $username],
                ])->get();
            }
            if($projects)
            {
                $flag_project = 1;
            }
            return view('project.project', ['flag_project' => $flag_project, 'projects' => $projects, 'error_message' => $error_message]);
        }

        $active = false;
        if($is_active == "true")
            $active = true;
        if($title == "")
            $title = "Untitled";

        DB::table('projects')->insert(
             array(
                 'title' => $title,
                 'description' => $description,
                 'meta_title' => $meta_title,
                 'meta_description' => $meta_description,
                 'img_name' => $image_name,
                 'date' => $date,
                 'client' => $client,
                 'role' => $role,
                 'permalink' => $permalink,
                 'tags' => $tags,
                 'password_protected' => $password_protected,
                 'project_external_url' => $project_external_url,
                 'is_active' => $active,
                 'username' => $username,
             )
        );

        $projects = DB::table('projects')->where([
            ['username', '=', $username],
        ])->get();
        $num_projects = count($projects);
        $error_message = "";
        if($num_projects > 10)
        {
            DB::table('projects')->where([
                ['img_name', '=', $image_name],
            ])->delete();
            $error_message = "Your projects are out of limit.";
            $projects = DB::table('projects')->where([
                ['username', '=', $username],
            ])->get();
        }
        if($projects)
        {
            $flag_project = 1;
        }
        return view('project.project', ['flag_project' => $flag_project, 'projects' => $projects, 'error_message' =>     $error_message]);
    }


    function update_project(Request $request, $id)
    {
        $username = \Auth::user()->name;
        $request->session()->put('project_id', $id);

        $project = DB::table('projects')->where([
            ['id', '=', $id],
        ])->first();
        $images = DB::table('images')->where([
            ['project_image_name', '=', $project->img_name],
            ['username', '=', $username]
        ])->get();
        //echo $request->session()->get('project_id');
        return view('project.update', ['project' => $project, 'images' => $images]);

    }

    function onoff_project(Request $request)
    {
        $id = $request->id;
        $return_flag = "On";
        $project = DB::table('projects')->where([
            ['id', '=', $id],
        ])->first();

        if($project->is_active == 1)
        {
            DB::table('projects')->where('id', $id)->update(array('is_active' => 0));
            $return_flag = "On";
        }
        else {
            DB::table('projects')->where('id', $id)->update(array('is_active' => 1));
            $return_flag = "Off";
        }

        return $return_flag;
    }

    function delete_project(Request $request)
    {
        $id = $request->id;
        $username = \Auth::user()->name;
        DB::table('projects')->where('id',$id)->delete();
        $projects = DB::table('projects')->where([
            ['username', '=', $username],
        ])->get();
        $num_projects = count($projects);
        return $num_projects;
    }

    function delete_update_project($id)
    {
        $id = $id;
        $username = \Auth::user()->name;
        DB::table('projects')->where('id',$id)->delete();

        return Redirect::to('/admin/project');

    }

    function save_image_project(Request $request)
    {
        $username = \Auth::user()->name;
        $this->validate($request, [
            'image_file' => 'required|image',
        ]);
        $file = Input::file('image_file');
        //$image_first = $request->session()->get('image_embeded_first');
        //$request->session()->put('image_embeded_second', $image_first);
        if($request->session()->get('image_embeded_first') != $file->getClientOriginalName())
        {
            $image_name = $username."-".time().$file->getClientOriginalName();
            $request->session()->put('image_embeded_first', $file->getClientOriginalName());
            $request->image_file->move(public_path('embeded_image'), $image_name);
            $id = $request->session()->get('project_id');
            $project = DB::table('projects')->where([
                ['id', '=', $id],
            ])->first();
            DB::table('images')->insert(
                 array(
                     'project_image_name' => $project->img_name,
                     'image_name' => $image_name,
                     'is_active' => true,
                     'is_saved' => false,
                     'username' => $username,
                 )
             );
        }
        $id = $request->session()->get('project_id');
        //return Redirect::to('/admin/project/update/project', ['id' => $id]);
        //return redirect()->route('/admin/project/update/project', ['id' => $id]);
        return redirect()->action(
            'ProjectController@update_project', ['id' => $id]
        );
    }

    function update_onoff_project(Request $request)
    {
        $id = $request->id;
        $return_flag = "on";
        $image = DB::table('images')->where([
            ['id', '=', $id],
        ])->first();

        if($image->is_active == 1)
        {
            DB::table('images')->where('id', $id)->update(array('is_active' => 0));
            $return_flag = "on";
        }
        else {
            DB::table('images')->where('id', $id)->update(array('is_active' => 1));
            $return_flag = "off";
        }

        return $return_flag;
    }

    function update_delete_project(Request $request)
    {
        $id = $request->id;
        DB::table('images')->where('id',$id)->delete();
        return "Successfully Deleted.";
    }

    function update_save_project(Request $request)
    {
        $id = $request->project_id;
        $username = \Auth::user()->name;
        $project = DB::table('projects')->where([
            ['id', '=', $id],
        ])->first();
        DB::table('projects')->where('id', $id)->update(
            array(
                'title' => $request->title,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'date' => $request->date,
                'client' => $request->client,
                'role' => $request->role,
                'permalink' => $request->permalink,
                'tags' => $request->tags,
                'password_protected' => $request->password,
                'project_external_url' => $request->external_url
        ));
        DB::table('images')->where([
            ['username', '=', $username],
            ['project_image_name', '=', $project->img_name],
        ])->update(array(
            'is_saved' => 1
        ));

        return redirect()->action(
            'HomeController@index'
        );
    }

}
