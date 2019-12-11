<?php

namespace App\Http\Controllers\Views\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Blog\Repositories\PostRepository;
use Modules\Activity\Repositories\ActivityRepository;
use Modules\Project\Repositories\ProjectRepository;
use Modules\Boukarian\Repositories\ProjectSubmissionRepository;

class HomeController extends Controller
{

    /**
     * @var PostRepository $postRepository
     */
    protected $postRepository;

     /**
     * @var ActivityRepository $activityRepository
     */
    protected $activityRepository;
   
    /**
     * @var ProjectRepository $projectRepository
     */
    protected $projectRepository;

    /**
     * @var ProjectSubmissionRepository $projectSubmissionRepository
     */
    protected $projectSubmissionRepository;


    /**
     * DashboardController constructor.
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(PostRepository $postRepository,ActivityRepository $activityRepository,ProjectRepository $projectRepository,ProjectSubmissionRepository $projectSubmissionRepository)
    {
        $this->postRepository = $postRepository;
        $this->activityRepository = $activityRepository;
        $this->projectRepository = $projectRepository;
        $this->projectSubmissionRepository = $projectSubmissionRepository;
    }
    /**
     * Dasboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard ()
    {
        $post = $this->postRepository->count();
        $activity = $this->activityRepository->count();
        $project = $this->projectRepository->count();
        $projectsubmission = $this->projectSubmissionRepository->count();

        return view('backend.home.dashboard',compact('post','activity','project','projectsubmission'));
    }

    /**
     * List users
     * @return View
     */
    public function users ()
    {
        return view('backend.home.users');
    }

    /**
     * File Manager
     * @return View
     */
    public function files ()
    {
        return view('backend.files.files');
    }
}
