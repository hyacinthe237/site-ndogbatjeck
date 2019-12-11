<?php

namespace Modules\Partner\Repositories;

use Modules\Partner\Entities\Partner;
use App\Repositories\Eloquent\BaseRepository;

class PartnerRepository extends BaseRepository
{

    /**
     * PartnerRepository constructor.
     *
     * @param Partner $partner
     */
    public function __construct(Partner $partner)
    {
        $this->model = $partner;
    }

    /**
    * Find data by field and value
    *
    * @param       $field
    * @param       $value
    * @param array $columns
    *
    * @return mixed
    */
   public function findByValue($field, $value = null, $columns = ['*'])
   {
       $this->applyCriteria();
       return  $this->model->where($field, '=', $value)->get($columns);

   }

    /**
     * Get number of the records
     *
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginator
     */
    public function pageGold($number = 10, $sort = 'desc', $sortColumn = 'id')
    {
        $this->applyCriteria();

        return $this->model->where('category', 'Gold')->orderBy($sortColumn, $sort)->orderBy('id', 'desc')->paginate($number);
    }

    /**
     * Get number of the records
     *
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginator
     */
    public function pageSilver($number = 10, $sort = 'desc', $sortColumn = 'id')
    {
        $this->applyCriteria();

        return $this->model->where('category', 'Silver')->orderBy($sortColumn, $sort)->orderBy('id', 'desc')->paginate($number);
    }

    /**
     * Get number of the records
     *
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginator
     */
    public function pagePlatinum($number = 10, $sort = 'desc', $sortColumn = 'id')
    {
        $this->applyCriteria();

        return $this->model->where('category', 'Platinum')->orderBy($sortColumn, $sort)->orderBy('id', 'desc')->paginate($number);
    }

}
