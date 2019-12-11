<?php

namespace Modules\Team\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Team\Http\Requests\MemberRequest;
use Modules\Team\Repositories\MemberRepository;

class MemberController extends Controller
{

   /**
     * @var MemberRepository $memberRepository
     */
    protected $memberRepository;

    /**
     * PartnerController constructor.
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
        return view('team::frontend.index');
    }



    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($code)
    {
        $member = $this->memberRepository->findByField('code',$code);

        if(is_null($member) ) {
            return abort(404);
        }

        return view('team::frontend.show', compact('member'));
    }

}
