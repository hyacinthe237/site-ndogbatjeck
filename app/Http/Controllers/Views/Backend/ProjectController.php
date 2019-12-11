<?php

namespace App\Http\Controllers\Views\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{

    /**
     * Dasboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index ()
    {
        return view('backend.project.index');
    }

    /**
     * List users
     * @return View
     */
    public function create ()
    {
        return view('backend.project.create');
    }

    /**
     * File Manager
     * @return View
     */
    public function edit ()
    {
        return view('backend.project.edit');
    }
}
