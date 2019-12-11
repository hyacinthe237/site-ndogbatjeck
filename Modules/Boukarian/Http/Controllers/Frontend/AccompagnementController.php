<?php

namespace Modules\Boukarian\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AccompagnementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('boukarian::frontend.accompagnement');
    }


    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('boukarian::show');
    }  


}
