<?php

namespace Modules\Activity\Http\Controllers\Frontend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Activity\Repositories\ActivityRepository;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;

class ActivityController extends Controller
{
    /**
     * [protected description]
     * @var [type]
     */
    protected $activityRepository;

    /**
     * @var CommentRepository $commentRepository
     */
    protected $commentRepository;

    /**
     * [__construct description]
     * @param ActivityRepository $activityRepository [description]
     */
    public function __construct(ActivityRepository $activityRepository, CommentRepository $commentRepository)
    {
        $this->activityRepository = $activityRepository;
        $this->commentRepository = $commentRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $events = $this->activityRepository
                   ->page(12,'desc','date_activity');

        return view('activity::frontend.index', compact('events'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($slug)
    {
        $activity = $this->activityRepository
               ->with('subjects')
               ->findByField('slug', $slug);

        $activites = $this->activityRepository->otherActivities($slug, 3);

        return view('activity::frontend.show', compact('activity','activites'));
    }

    /**
     * add comment on the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request, $id)
    {
        try
        {
            $input = $request->all();
            $activity = $this->activityRepository->getById($id);
            $input['commentable_id'] = $activity->id;
            $input['commentable_type'] = get_class($activity);
            $input['created_for_activite'] = $activity->id;
            $comment = $this->commentRepository->store($input);

            if ($comment) return response()->json($comment);

        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],500);
        }
    }

    /**
     * list comment on the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listComments($id)
    {
        $comments = $this->commentRepository->getByActivityId($id);

        return response()->json($comments);
    }

}
