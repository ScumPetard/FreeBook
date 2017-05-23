<?php
namespace App\Repository;

use App\Models\Book;

class BookRepository implements Repository
{
    protected $model;

    public function __construct(Book $book)
    {
        $this->model = $book;
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
}