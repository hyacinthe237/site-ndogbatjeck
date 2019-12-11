<?php

namespace Modules\Boukarian\Http\Controllers\Frontend;

use Modules\Partner\Entities\Partner;
use Modules\Team\Entities\Member;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Team\Repositories\MemberRepository;
use Modules\Partner\Repositories\PartnerRepository;

class AProposController extends Controller
{
    /**
     * @var MemberRepository $memberRepository
     * @var PartnerRepository $partnerRepository
     */
    protected $memberRepository;
    protected $partnerRepository;

    /**
     * AProposController constructor.
     *
     * @param MemberRepository $memberRepository
     * @param PartnerRepository $partnerRepository
     */
    public function __construct(MemberRepository $memberRepository, PartnerRepository $partnerRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->partnerRepository = $partnerRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index ()
    {
        $membres = Member::get();
        $golds = Partner::where('category', 'Gold')->paginate(6);
        $silvers = Partner::where('category', 'Silver')->paginate(6);
        $platinums = Partner::where('category', 'Platinum')->paginate(6);

        return view('boukarian::frontend.a_propos', compact('membres', 'golds', 'silvers', 'platinums'));
    }


}
