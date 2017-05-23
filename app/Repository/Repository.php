<?php
namespace App\Repository;

interface Repository
{

    public function selectAll();

    public function find($id);

}