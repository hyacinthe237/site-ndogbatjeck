<?php

namespace Modules\Offer\Repositories;

use Modules\Offer\Entities\OfferSubmission;
use App\Repositories\Eloquent\BaseRepository;

class OfferSubmissionRepository extends BaseRepository 
{
  
    /**
     * OfferRepository constructor.
     *
     * @param OfferSubmission $offerSub
     */
    public function __construct(OfferSubmission $offerSub)
    {
        $this->model = $offerSub;
    }

}
