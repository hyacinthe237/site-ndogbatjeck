<?php

namespace Modules\Partner\Http\Controllers\Frontend;

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
        $golds = $this->partnerRepository
                ->where('category', 'Gold')
                ->all();

        $silvers = $this->partnerRepository
                ->where('category', 'Silver')
                ->all();

        $platinums = $this->partnerRepository
                ->where('category', 'Platinum')
                ->all();

        return view('partner::frontend.index', compact('golds','silvers','platinums'));
    }



    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($code)
    {
        $partner = $this->partnerRepository->findByField('code',$code);

        if(is_null($partner) ) {
            return abort(404);
        }

        return view('partner::frontend.show', compact('partner'));
    }

}
