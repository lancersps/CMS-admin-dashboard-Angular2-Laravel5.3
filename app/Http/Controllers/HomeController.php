<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flag_project = 0;
        $username = \Auth::user()->name;
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
}
