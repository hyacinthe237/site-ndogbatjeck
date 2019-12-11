<?php

namespace Modules\Project\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\Theme;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $projects = Project::wherePublished('published')->get();
        return view('project::frontend.projects.index', compact('projects'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($slug)
    {
        $project = Project::wherePublished('published')->whereSlug($slug)->first();
        $projects = Project::wherePublished('published')->where('id', '<>', $project->id)->get();

        if(is_null($project) ) {
            return abort(400);
        }

        return view('project::frontend.projects.show', compact('project', 'projects'));
    }

}
