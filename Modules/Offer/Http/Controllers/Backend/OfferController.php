<?php

namespace Modules\Offer\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Offer\Http\Requests\OfferRequest;
use Modules\Offer\Repositories\OfferRepository;

class OfferController extends Controller
{

   /**
     * @var offerRepository $offerRepository
     */
    protected $offerRepository;

    /**
     * OfferController constructor.
     *
     * @param OfferRepository $offerRepository
     */
    public function __construct(OfferRepository $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $offers = $this->offerRepository->page(self::BACKEND_PAGINATE);
        return view('offer::backend.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('offer::backend.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(OfferRequest $request)
    {
        try {
             $input = $request->all();
             $offer = $this->offerRepository->store($input);
             if ($offer){
                 return redirect()->route('admin.offers.edit', $offer->id)
                 ->withSuccess('L offre a bien été créé !');
             }

             return redirect()->back()
             ->withInputs($request->all())
             ->withErrors([
                 'error' => "Erreur lors de la creation de l offre"
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
        $offer = $this->offerRepository->findByField('id',$id);

        if(is_null($offer) ) {
            return abort(404);
        }

        return view('offer::backend.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $offer = $this->offerRepository
                    ->findByField('id',$id);

        return view('offer::backend.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $id)
    {
        try{
            $offer = $this->offerRepository->find($id);

            if (!$offer) return redirect()->route('admin.offers');

            $offer = $this->offerRepository->update($offer->id, $request->all());

            return redirect()->route('admin.offers.edit', $offer->id)
            ->withSuccess('L offre a bien été mis à jour !');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInputs($request->all())
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
            $delete = $this->offerRepository->delete($id);
            if ($delete) {
                return redirect()->route('admin.offers')
                     ->withSuccess("l'offre a été supprimé!");
            }
        }catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage());
        }
    }
}
