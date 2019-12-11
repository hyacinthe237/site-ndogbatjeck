<?php

namespace Modules\Project\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Project\Http\Requests\ProjectRequest;
use Modules\Project\Repositories\ProjectRepository;
use Modules\Project\Repositories\ThemeRepository;

class ProjectsController extends Controller
{

   /**
     * @var projectRepository $projectRepository
     * @var themeRepository $themeRepository
     */
    protected $projectRepository;
    protected $themeRepository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectRepository $projectRepository
     * @param ThemeRepository $themeRepository
     */
    public function __construct(ProjectRepository $projectRepository, ThemeRepository $themeRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->themeRepository = $themeRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $projects = $this->projectRepository->page(self::BACKEND_PAGINATE);
        return view('project::backend.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $themes = $this->themeRepository->all();
        return view('project::backend.create', compact('themes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ProjectRequest $request)
    {
        try {
             $input = $request->all();
             $project = $this->projectRepository->store($input);
             if ($project){

                 return redirect()->route('admin.projects.edit', $project->id)
                 ->withSuccess('Le projet a bien été créé !');
             }

             return redirect()->back()

             ->withInputs($request->all())
             ->withErrors([
                 'error' => "Erreur lors de la creation du projet"
             ]);

         } catch (\Exception $e) {
             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors($e->getMessage());
         }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->findByField('id',$id);

        if(is_null($project) ) {
            return abort(400);
        }

        return view('project::backend.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $themes = $this->themeRepository->all();
        $project = $this->projectRepository->findByField('id', $id);

        $themes = $themes->mapWithKeys(function ($item, $key) {
              return [$item['id'] => $item['name']];
        });

        $themes=$themes->all();

        if (!$project) return redirect()->route('admin.projects');

        return view('project::backend.edit', compact('project', 'themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        try
        {
            $project = $this->projectRepository->find($id);

            if (!$project) return redirect()->route('admin.projects');

            $project = $this->projectRepository->update($project->id, $request->all());

            return redirect()->route('admin.projects.edit', $project->id)
                            ->withSuccess('Le projet a bien été mis à jour !');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delete = $this->projectRepository->delete($id);
            if ($delete) {
                return redirect()->route('admin.projects')
                     ->with('message', "le projet a été supprimé!");
            }
        }catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage());
        }
    }
}
