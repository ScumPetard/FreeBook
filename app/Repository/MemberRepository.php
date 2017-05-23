<?php
namespace App\Repository;

use App\Models\Member;

class MemberRepository implements Repository
{
    protected $model;

    public function __construct(Member $member)
    {
        $this->model = $member;
    }

    public function selectAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
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

    /**
     * 校验邮箱是否唯一
     */
    public function emailUnique($email = null)
    {
        $result = $this->model->where('email',$email)->first();
        if ($result) {
            return true;
        }
        return false;
    }
}