<?php

namespace Modules\Boukarian\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Boukarian\Entities\ProjectSubmission;
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
    public function index(Request $request)
    {
        $status = $request->status;
        $open = $request->open;
        $soumissions = ProjectSubmission::when($status, function($query) use ($status) {
            return $query->where('status', $status);
        })
        ->when($open, function($query) use ($open) {
            return $query->where('open', '=', $open);
        })
        ->paginate(self::BACKEND_PAGINATE);

        return view('boukarian::backend.soumissions.index', compact('soumissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validated($id, $status)
    {
        try
        {

            $soumission = $this->projectSubmissionRepository->find($id);

            if (!$soumission)
               return redirect()->route('admin.soumissions');

            if( $status == 'Rejete' ){
                $soumission->status =  $status;
                $soumission->update();
                return redirect()->route('admin.soumissions.show', $soumission->id)
                    ->withSuccess('La soumission a bien été rejetée !');
            }

            if( $status == 'Approuve' ){
                $soumission->status =  $status;

                $soumission->update();
                return redirect()->to('admin/projects/create')
                                ->withSuccess('Vous venez d\'approuvée la soumission du projet, créez son projet associé !');

            }


        } catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],500);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('boukarian::backend.soumissions.create');
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
                 return redirect()->route('admin.soumissions.edit', $soumission->id)
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

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $soumission = $this->projectSubmissionRepository->findByField('id',$id);

        if(is_null($soumission) ) {
            return abort(400);
        }

        $soumission->open = 'Yes';
        $soumission->update();

        return view('boukarian::backend.soumissions.show', compact('soumission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved($id)
    {
        try
        {
            $soumission = $this->projectSubmissionRepository->find($id);

            if (!$soumission)
               return redirect()->route('admin.soumissions');

            if($soumission->status == 'rejected'){
                $soumission->status = 'approved';
                $soumission->update();
                return redirect()->route('admin.soumissions.show', $soumission->id)
                    ->withSuccess('Vous venez d\'approuver la soummission de ce projet ');
            }

            if($soumission->status == 'approved'){
                $soumission->status = 'rejected';

                $soumission->update();
                return redirect()->route('admin.soumissions.show', $soumission->id)
                    ->withSuccess('Vous venez de rejeter la soummission de ce projet ');
            }


        } catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $soumission = $this->projectSubmissionRepository->findByField('id', $id);

        if (!$soumission) return redirect()->route('admin.soumissions');

        return view('boukarian::backend.soumissions.edit', compact('soumission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectSubmissionRequest $request, $id)
    {
        try
        {
            $soumission = $this->projectSubmissionRepository->find($id);

            if (!$soumission) return redirect()->route('admin.soumissions');

            $soumission = $this->projectSubmissionRepository->update($soumission->id, $request->all());

            return redirect()->route('admin.soumissions.edit', $soumission->id)
                            ->withSuccess('Le projet a bien été mise à jour !');

        } catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],500);
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
            $soumission = $this->projectSubmissionRepository->find($id);

            $delete = $this->projectSubmissionRepository->delete($id);
            if ($delete) {
                return response()->json(['message'=>'the project has been deleted'],200);
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],500);
        }
    }
}
