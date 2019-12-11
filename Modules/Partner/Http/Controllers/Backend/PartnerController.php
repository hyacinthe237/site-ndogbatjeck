<?php

namespace Modules\Partner\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Partner\Http\Requests\PartnerRequest;
use Modules\Partner\Repositories\PartnerRepository;

class PartnerController extends Controller
{

   /**
     * @var partnerRepository $partnerRepository
     */
    protected $partnerRepository;

    /**
     * PartnerController constructor.
     *
     * @param PartnerRepository $partnerRepository
     */
    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $partners = $this->partnerRepository->page(self::BACKEND_PAGINATE);
        return view('partner::backend.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $partners = $this->partnerRepository->all();
        return view('partner::backend.create', compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(PartnerRequest $request)
    {
        try {
             $input = $request->all();
             $partner = $this->partnerRepository->store($input);
             if ($partner){
                 return redirect()->route('admin.partners.edit', $partner->id)
                 ->withSuccess('Le partenaire a bien été créé !');
             }

             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors([
                 'error' => "Erreur lors de la creation du partenaire"
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
        $partner = $this->partnerRepository->findByField('id',$id);

        if(is_null($partner) ) {
            return abort(404);
        }

        return view('partner::backend.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $partner = $this->partnerRepository
                    ->findByField('id',$id);

        return view('partner::backend.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, $id)
    {
        try{
            $partner = $this->partnerRepository->find($id);

            if (!$partner) return redirect()->route('admin.partners');

            $partner = $this->partnerRepository->update($partner->id, $request->all());

            return redirect()->route('admin.partners.edit', $partner->id)
            ->withSuccess('Le partenaire a bien été mis à jour !');

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
            $delete = $this->partnerRepository->delete($id);
            if ($delete) {
                return redirect()->route('admin.partners')
                     ->withSuccess('le partenaire a été supprimé!');
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],404);
        }
    }
}
