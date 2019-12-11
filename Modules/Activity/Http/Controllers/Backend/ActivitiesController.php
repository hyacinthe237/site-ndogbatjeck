<?php

namespace Modules\Activity\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Activity\Entities\Activity;
use Modules\Activity\Http\Requests\ActivityRequest;
use Modules\Activity\Repositories\ActivityRepository;
use Modules\Activity\Repositories\SubjectRepository;

class ActivitiesController extends Controller
{

   /**
     * @var ActivityRepository $activityRepository
     * @var SubjectRepository $subjectRepository
     */
    protected $activityRepository;
    protected $subjectRepository;

    /**
     * ActivityController constructor.
     *
     * @param ActivityRepository $activityRepository
     */
    public function __construct(ActivityRepository $activityRepository, SubjectRepository $subjectRepository)
    {
        $this->activityRepository = $activityRepository;
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $published = $request->published;

        $activities = Activity::when($published, function($query) use ($published) {
            return $query->where('published', $published);
        })
        ->paginate(self::BACKEND_PAGINATE);
        return view('activity::backend.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $subjects = $this->subjectRepository->all();
        return view('activity::backend.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        try {
             $input = $request->all();
             $input['date_activity'] = Carbon::parse($request->date_activity);
             $input['time_activity'] = $request->hour . ':' . $request->minutes;

             $activity = $this->activityRepository->store($input);
             
             if ($activity){
                 return redirect()->route('admin.activites.edit', $activity->id)
                 ->withSuccess("L\'événement a bien été créée !");
             }

             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors([
                 'error' => "Erreur lors de la creation de l'évenement"
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
    public function show($code)
    {
        $activity = $this->activityRepository->findByField('code',$code);

        if(is_null($activity) ) {
            return abort(404);
        }

        return view('activity::backend.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $subjects = $this->subjectRepository->all();
        $activity = $this->activityRepository->find($id);

        return view('activity::backend.edit', compact('activity', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, $id)
    {
        try
        {
            $activity = $this->activityRepository->find($id);

            if (!$activity) return redirect()->route('admin.activites');

            $input = $request->all();
            $input['date_activity'] = Carbon::parse($request->date_activity);
            $input['time_activity'] = $request->hour . ':' . $request->minutes;

            $activity = $this->activityRepository->update($activity->id, $input);

            return redirect()->route('admin.activites.edit', $activity->id)
            ->withSuccess('L\'événement a bien été mise à jour !');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
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
            $activity = $this->activityRepository->find($id);

            $delete = $this->activityRepository->delete($id);
            if ($delete) {
                return response()->json(['message'=>'the activity has been deleted'],200);
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'Erruer lors de la suppression de l\'événement'],500);
        }
    }
}
