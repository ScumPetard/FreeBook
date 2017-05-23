<?php
namespace App\Repository\Admin;

use App\Models\User;
use App\Repository\Repository;

class AdminRepository implements Repository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function selectAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function checkEmailUnique($email)
    {
        $resource = $this->model->where('email',$email)->get();
        if (count($resource)) {
            return true;
        }
        return false;
    }

    public function create(Array $array)
    {
        return $this->model->create($array);
    }
}