<?php
namespace App\Repository;

use Bican\Roles\Models\Permission;

class PermissionRepository implements Repository
{
    protected $model;

    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function selectAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function checkSlugUnique($slug)
    {
        $resource = $this->model->where('slug',$slug)->get();
        if (count($resource)) {
            return true;
        }
        return false;
    }

    public function create(Array $array)
    {
        return $this->model->create($array);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function update($id, Array $array)
    {
        return $this->model->where('id',$id)->update($array);
    }
}