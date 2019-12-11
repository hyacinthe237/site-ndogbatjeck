<?php

namespace Modules\Boukarian\Http\Controllers\Frontend;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Boukarian\Http\Requests\JoinUsRequest;
use Modules\Boukarian\Repositories\JoinUsRepository;

class JoinUsController extends Controller
{
    /**
      * @var JoinUsRepository $joinUsRepository
      */
     protected $joinUsRepository;

     /**
      * JoinUsController constructor.
      *
      * @param JoinUsRepository $joinUsRepository
      */
     public function __construct(JoinUsRepository $joinUsRepository)
     {
         $this->joinUsRepository = $joinUsRepository;
     }

     /**
      * Show the form for creating a new resource.
      * @return Response
      */
     public function create()
     {

         return view('boukarian::frontend.join_us');
     }

     /**
      * Store a newly created resource in storage.
      * @param  Request $request
      * @return Response
      */
     public function store(JoinUsRequest $request)
     {
         try {
              $input = $request->all();
              $joinUs = $this->joinUsRepository->store($input);
              if ($joinUs){
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



}
