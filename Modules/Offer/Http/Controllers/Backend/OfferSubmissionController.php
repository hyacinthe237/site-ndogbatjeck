<?php

namespace Modules\Offer\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Offer\Http\Requests\OfferSubmissionRequest;
use Modules\Offer\Repositories\OfferSubmissionRepository;

class OfferSubmissionController extends Controller
{

   /**
     * @var offerSubmissionRepository $offerSubmissionRepository
     */
    protected $offersubmissionRepository;

    /**
     * OfferSubmissionController constructor.
     *
     * @param OfferSubmissionRepository $offerSubmissionRepository
     */
    public function __construct(OfferSubmissionRepository $offerSubmissionRepository)
    {
        $this->offerSubmissionRepository = $offerSubmissionRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $submissions = $this->offerSubmissionRepository->with('offer')->page(self::BACKEND_PAGINATE);
        return view('offer::backend.submissions.index', compact('submissions'));
    }



    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($code)
    {
        $submission = $this->offerSubmissionRepository->findByField('code',$code);

        if(is_null($submission) ) {
            return abort(404);
        }
        // update the status
        $submission->open = True;
        $submission->update();
        
        return view('offer::backend.submissions.show', compact('submission'));
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
            $delete = $this->offerSubmissionRepository->delete($id);
            if ($delete) {
                return redirect()->route('admin.offers.submissions')
                     ->withSuccess('La souscription a été supprimée !');
            }
        }catch (\Exception $e) {
            return response()->json(['message'=>'internal server error'],404);
        }
    }
}
