<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{    
    /**
     * model
     *
     * @var mixed
     */
    protected $model;

        
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    /**
     * get
     *
     * @param  mixed $columns
     * @param  mixed $where
     * @param  mixed $withRelations
     * @return Collection
     */
    public function get(array $columns = ['*'], array $where = [], array $withRelations = []): Collection
    {  
        return $this->model->where($where)->with($withRelations)->get($columns);
    }
           
    /**
     * create
     *
     * @param  mixed $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

        /**
     * update
     *
     * @param  mixed $attributes
     * @param  mixed $id
     * @return bool
     */
    public function update(array $attributes, int $id): bool
    {
        $model = $this->findOrFail($id);
        return $model->update($attributes);
    }
    
    /**
     * updateOrCreate
     *
     * @param  mixed $attributes
     * @return Model
     */
    public function updateOrCreate(array $attributes, array $values = []): Model
    {
        return $this->model->updateOrCreate($attributes, $values);
    }
    
    /**
     * find
     *
     * @param  mixed $id
     * @return Model
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }
    
    /**
     * findOrFail
     *
     * @param  mixed $id
     * @return Model
     */
    public function findOrFail(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
    
    /**
     * delete
     *
     * @param  mixed $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $model = $this->findOrFail($id);
        return $model->delete();
    }
}