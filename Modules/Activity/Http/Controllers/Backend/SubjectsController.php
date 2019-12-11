<?php

namespace Modules\Activity\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Activity\Http\Requests\SubjectRequest;
use Modules\Activity\Repositories\SubjectRepository;

class SubjectsController extends Controller
{

   /**
     * @var SubjectRepository $subjectRepository
     */
    protected $subjectRepository;

    /**
     * SubjectController constructor.
     *
     * @param SubjectRepository $subjectRepository
     */
    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $subjects = $this->subjectRepository
                ->with('parent')
                ->page(self::BACKEND_PAGINATE);
        return view('activity::subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $subjects = $this->subjectRepository->all();
        return view('activity::subjects.create', compact('subjects'));
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
             $subject = $this->subjectRepository->store($input);
             if ($subject){
                 return redirect()->route('admin.sujets.edit', $subject->id)
                 ->withSuccess('Le sujet a bien été crée !');
             }

             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors([
                 'error' => "Erreur lors de la creation du sujet"
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
        $subject = $this->subjectRepository->findByField('code',$code);

        if(is_null($subject) ) {
            return abort(404);
        }

        return view('activity::subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $subjects = $this->subjectRepository->all();
        $subject = $this->subjectRepository->find($id);

        $index = 0;

        foreach ($subjects as $item) {
            if ($subject->id == $item->id) {
                unset($subjects[$index]);
            }
            $index++;
        }

        return view('activity::subjects.edit', compact('subjects','subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $subject = $this->subjectRepository->find($id);

            if (!$subject) return redirect()->route('admin.sujets');

            $subject = $this->subjectRepository->update($subject->id, $request->all());

            return redirect()->route('admin.sujets.edit', $subject->id)
            ->withSuccess('Le sujet a bien été mis à jour !');

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
            $subject = $this->subjectRepository->find($id);

            $delete = $this->subjectRepository->delete($id);
            if ($delete) {
                return response()->json(['message'=>'the subject has been deleted'],200);
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],500);
        }
    }
}
