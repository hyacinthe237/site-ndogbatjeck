<?php
namespace App\Repositories\Eloquent;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\CriteriaInterface;


/**
  * @internal
  * @category Repository pattern
  * @author Ulrich Ntella <ulrichsoft2002@gmail.com>
*/
abstract class BaseRepository
{

    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * @var PresenterInterface
     */
    protected $presenter;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = null;

    /**
     * Collection of Criteria
     *
     * @var Collection
     */
    protected $criteria;

    /**
     * @var bool
     */
    protected $skipCriteria = false;

    /**
     * @var bool
     */
    protected $skipPresenter = false;

    /**
     * @var \Closure
     */
    protected $scopeQuery = null;



    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        $this->applyCriteria();
        return  $this->model->findOrFail($id, $columns);
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
    public function findByField($field, $value = null, $columns = ['*'])
    {
        $this->applyCriteria();
        return  $this->model->where($field, '=', $value)->first();

    }

    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*'])
    {
        $this->applyConditions($where);
        return  $this->model->get($columns);

    }

    /**
     * Find data by multiple values in one field
     *
     * @param       $field
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereIn($field, array $values, $columns = ['*'])
    {
       $this->applyCriteria();
       return $this->model->whereIn($field, $values)->get($columns);

    }

    /**
     * Find data by excluding multiple values in one field
     *
     * @param       $field
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        $this->applyCriteria();
        return $this->model->whereNotIn($field, $values)->get($columns);

    }
    /**
     * @param int $number
     * @return Model
     */
    public function findByNumber($number)
    {
        $this->applyCriteria();
        return $this->model->where('number', $number)->first();
    }

    /**
     * @param  Uuid $code
     * @return Model
     */
    public function findByCode($code)
    {
        $this->applyCriteria();
        return $this->model->where('code', $code)->first();
    }

    /**
     * Get all the records
     *
     * @return array Model
     */
    public function all()
    {
        $this->applyCriteria();
        return $this->model->get();
    }

    /**
     * @return array
     */
    public function count()
    {
        return $this->model->count();
    }

    /**
     * Get number of the records
     *
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginator
     */
    public function page($number = 10, $sort = 'desc', $sortColumn = 'id')
    {
        $this->applyCriteria();

        return $this->model->orderBy($sortColumn, $sort)->paginate($number);
    }



    /**
     * Load relations
     *
     * @param array|string $relations
     *
     * @return $this
     */
    public function with($relations)
    {
        $this->model = $this->model->with($relations);

        return $this;
    }

    /**
     * @param $input
     * @return Model
     */
    public function store($input)
    {
        return $this->save($this->model, $input);
    }

    /**
     * @param $id
     * @param $input
     * @return Model
     */
    public function update($id, $input)
    {
        $this->model = $this->find($id);
        return $this->save($this->model, $input);
    }

    /**
     * @param int $id
     *
     * @return Model
     * @throws \Exception
     */
    public function delete($id)
    {
        $this->model = $this->find($id);
        $this->model->delete();

        return $this->model;
    }

    /**
     * @param Model $model
     * @param array $input
     * @return Model
     */
    protected function save($model, $input)
    {
        $model->fill($input);
        $model->save();
        return $model;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get Collection of Criteria
     *
     * @return Collection
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * Push Criteria for filter the query
     *
     * @param $criteria
     *
     * @return $this
     */
    public function pushCriteria($criteria)
    {
        if (is_string($criteria)) {
            $criteria = new $criteria;
        }
        if (!$criteria instanceof CriteriaInterface) {
            throw new RepositoryException("Class " . get_class($criteria) . " must be an instance of App\\Repositories\\Contracts\\CriteriaInterface");
        }
        $this->criteria = new Collection();
        $this->criteria->push($criteria);

        return $this;
    }

     /**
     * Apply criteria in current Query
     *
     * @return $this
     */
    protected function applyCriteria()
    {

        if ($this->skipCriteria === true) {
            return $this;
        }

        $criteria = $this->getCriteria();

        if ($criteria) {
            foreach ($criteria as $c) {
                if ($c instanceof CriteriaInterface) {
                    $this->model = $c->apply($this->model, $this->fieldSearchable);
                }
            }
        }

        return $this;
    }

    /**
     * Applies the given where conditions to the model.
     *
     * @param array $where
     * @return void
     */
    protected function applyConditions(array $where)
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->where($field, $condition, $val);
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
    }

    /**
     * Pop Criteria
     *
     * @param $criteria
     *
     * @return $this
     */
    public function popCriteria($criteria)
    {
        $this->criteria = $this->criteria->reject(function ($item) use ($criteria) {
            if (is_object($item) && is_string($criteria)) {
                return get_class($item) === $criteria;
            }

            if (is_string($item) && is_object($criteria)) {
                return $item === get_class($criteria);
            }

            return get_class($item) === get_class($criteria);
        });

        return $this;
    }


    /**
     * Find data by Criteria
     *
     * @param CriteriaInterface $criteria
     *
     * @return mixed
     */
    public function getByCriteria(CriteriaInterface $criteria)
    {
        $this->model = $criteria->apply($this->model, $this->fieldSearchable);
        $results = $this->model->get();
        $this->resetModel();

        return $this;
    }

    /**
     * Skip Criteria
     *
     * @param bool $status
     *
     * @return $this
     */
    public function skipCriteria($status = true)
    {
        $this->skipCriteria = $status;

        return $this;
    }

    /**
     * Reset all Criterias
     *
     * @return $this
     */
    public function resetCriteria()
    {
        $this->criteria = new Collection();

        return $this;
    }
}
