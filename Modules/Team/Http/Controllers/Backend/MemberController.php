<?php

namespace Modules\Team\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Team\Http\Requests\MemberRequest;
use Modules\Team\Repositories\MemberRepository;

class MemberController extends Controller
{

   /**
     * @var memberRepository $memberRepository
     */
    protected $memberRepository;

    /**
     * MemberController constructor.
     *
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $members = $this->memberRepository->page(self::BACKEND_PAGINATE);
        return view('team::backend.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $members = $this->memberRepository->all();
        return view('team::backend.members.create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(MemberRequest $request)
    {
        try {
             $input = $request->all();
             $member = $this->memberRepository->store($input);
             if ($member){
                 return redirect()->route('admin.members.edit', $member->id)
                 ->withSuccess('Le membre a bien été créé !');
             }

             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors([
                 'error' => "Erreur lors de la creation du membre"
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
        $member = $this->memberRepository->findByField('id',$id);

        if(is_null($member) ) {
            return abort(404);
        }

        return view('team::backend.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $member = $this->memberRepository
                    ->findByField('id',$id);

        return view('team::backend.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
    {
        try{
            $member = $this->memberRepository->find($id);

            if (!$member) return redirect()->route('admin.members');

            $member = $this->memberRepository->update($member->id, $request->all());

            return redirect()->route('admin.members.edit', $member->id)
            ->withSuccess('Le membre a bien été mis à jour !');

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
            $delete = $this->memberRepository->delete($id);
            if ($delete) {
                return redirect()->route('admin.members')
                     ->withSuccess('le membre a été supprimé!');
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],404);
        }
    }
}
