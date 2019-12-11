<?php

namespace Modules\Offer\Repositories;

use Modules\Offer\Entities\Offer;
use App\Repositories\Eloquent\BaseRepository;

class OfferRepository extends BaseRepository 
{
  
    /**
     * OfferRepository constructor.
     *
     * @param Offer $offer
     */
    public function __construct(Offer $offer)
    {
        $this->model = $offer;
    }

}
