<?php

namespace Modules\Boukarian\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Boukarian\Http\Requests\ProjectSubmissionRequest;
use Modules\Boukarian\Repositories\ProjectSubmissionRepository;

class ProjectSubmissionsController extends Controller
{

   /**
     * @var ProjectSubmissionRepository $soumissionSubmissionRepository
     */
    protected $soumissionSubmissionRepository;

    /**
     * ProjectSubmissionsController constructor.
     *
     * @param ProjectSubmissionRepository $soumissionSubmissionRepository
     */
    public function __construct(ProjectSubmissionRepository $soumissionSubmissionRepository)
    {
        $this->projectSubmissionRepository = $soumissionSubmissionRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $soumissions = $this->projectSubmissionRepository->all();
        //return view('project::frontend.soumissions.index', compact('soumissions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('boukarian::frontend.become_boukarian');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ProjectSubmissionRequest $request)
    {
        try {
             $input = $request->all();
             $soumission = $this->projectSubmissionRepository->store($input);
             if ($soumission){
                 return redirect()->route('boukarians.become-boukarian.create')
                                  ->withSuccess('Le projet a bien été sousmis !');
             }
             return redirect()->back()
                 ->withInputs($request->all())
                 ->withErrors([
                     'error' => "Erreur lors de la soumission du projet"
                 ]);

         } catch (\Exception $e) {
             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors($e->getMessage());
         }
    }


}
