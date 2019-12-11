<?php

namespace Modules\Boukarian\Http\Controllers\Frontend;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Boukarian\Http\Requests\SupportRequest;
use Modules\Boukarian\Repositories\SupportRepository;

class SupportsController extends Controller
{
    /**
      * @var SupportRepository $supportRepository
      */
     protected $supportRepository;

     /**
      * SupportController constructor.
      *
      * @param SupportRepository $supportRepository
      */
     public function __construct(SupportRepository $supportRepository)
     {
         $this->supportRepository = $supportRepository;
     }

     /**
      * Show the form for creating a new resource.
      * @return Response
      */
     public function create()
     {

         return view('boukarian::frontend.support');
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
              if ($input['support_type']=='autres') {
                 $input['support_type']=$input['other_support_type'];
              }
              $support = $this->supportRepository->store($input);
              if ($support){
                  return redirect()->back()
                    ->with('message', 'Votre formulaire a bien été envoyé');
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

     

}
