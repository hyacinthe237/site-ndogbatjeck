<?php

namespace Modules\Offer\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Offer\Repositories\OfferRepository;

class OfferController extends Controller
{
    
    /**
     * @var OfferRepository $offerRepository
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
        $offers = $this->offerRepository->all();
        return view('offer::index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('offer::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($code)
    {
        $offer = $this->offerRepository->findByField('code',$code);

        if(is_null($offer) ) {
            return abort(HTTP_NOTFOUND);
        }

        return view('offer::show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('offer::edit');
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
