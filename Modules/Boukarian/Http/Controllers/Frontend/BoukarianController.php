<?php

namespace Modules\Boukarian\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Project\Repositories\ProjectRepository;

class BoukarianController extends Controller
{

   /**
     * @var projectRepository $projectRepository
     */
    protected $projectRepository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $conditions = array('published' => 'published');
        $projects = $this->projectRepository->page(10);
        return view('boukarian::frontend.index', compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('boukarian::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

     /**
     * Show the specified resource.
     * @return Response
     */
    public function show($code)
    {
        $project = $this->projectRepository->with('theme')->findByField('code',$code);

        if(is_null($project) ) {
            return abort(400);
        }

        return view('boukarian::frontend.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('boukarian::edit');
    }
    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function becomeBoukarian()
    {
        return view('boukarian::frontend.become_boukarian');
    }


}
