<?php

namespace Modules\Boukarian\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Boukarian\Http\Requests\SupportRequest;
use Modules\Boukarian\Repositories\SupportRepository;

class SupportsController extends Controller
{
   /**
     * @var SupportRepository $supportRepository
     */
    protected $supportRepository;

    /**
     * SupportsController constructor.
     *
     * @param SupportRepository $supportRepository
     */
    public function __construct(SupportRepository $supportRepository)
    {
        $this->supportRepository = $supportRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $supports = $this->supportRepository->page(self::BACKEND_PAGINATE);
        return view('boukarian::backend.supports.index', compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('boukarian::backend.supports.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(SupportRequest $request)
    {
        try {
             $input = $request->all();
             $soumission = $this->supportRepository->store($input);
             if ($soumission){
                 return redirect()->route('admin.supports.edit', $soumission->id)
                                  ->withSuccess('Le support a bien été sousmis !');
             }
             return redirect()->back()
                 ->withInputs($request->all())
                 ->withErrors([
                     'error' => "Erreur lors de la creation du support"
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
        $support = $this->supportRepository->findByField('id',$id);

        if(is_null($support) ) {
            return abort(400);
        }

        return view('boukarian::backend.supports.show', compact('support'));
    }



    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $support = $this->supportRepository->findByField('id', $id);

        if (!$support) return redirect()->route('admin.supports');

        return view('boukarian::backend.supports.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupportRequest $request, $id)
    {
        try
        {
            $support = $this->supportRepository->find($id);

            if (!$support) return redirect()->route('admin.supports');

            $support = $this->supportRepository->update($support->id, $request->all());

            return redirect()->route('admin.supports.edit', $support->id)
                            ->withSuccess('Le support a bien été mise à jour !');

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
            $support = $this->supportRepository->find($id);

            $delete = $this->supportRepository->delete($id);
            if ($delete) {
                return response()->json(['message'=>'the project has been deleted'],200);
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],500);
        }
    }
}
