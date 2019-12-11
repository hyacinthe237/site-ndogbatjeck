<?php

namespace Modules\Offer\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Offer\Repositories\OfferRepository;
use Modules\Offer\Repositories\OfferSubmissionRepository;
use Modules\Boukarian\Http\Requests\OfferSubmissionRequest;

class OfferSubmissionController extends Controller
{
    
    /**
     * @var OfferSubmissionRepository $offersubmissionRepository
     */
    protected $offersubmissionRepository;

    /**
     * @var OfferRepository $offerRepository
     */
    protected $offerRepository;

    /**
     * OfferSubmissionController constructor.
     *
     * @param OfferSubmissionRepository $offersubmissionRepository
     */
    public function __construct(OfferSubmissionRepository $offersubmissionRepository,OfferRepository $offerRepository)
    {
        $this->offersubmissionRepository = $offersubmissionRepository;
         $this->offerRepository = $offerRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($code)
    {
        $offer = $this->offerRepository->findByField('code',$code);
        if(is_null($offer) ) {
            return abort(HTTP_NOTFOUND);
        }
        $offer_id=$offer->id;
        return view('offer::submissions.create', compact('offer_id'));
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
          $submission = $this->offersubmissionRepository->store($input);
          if ($submission){
              return redirect()->back()
                ->with('message', 'Votre formulaire a bien été envoyé');
          }

          return redirect()->back()
          ->withInputs($request->all())
          ->withErrors([
              'error' => "Erreur lors de la creation du formulaire"
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
    
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
