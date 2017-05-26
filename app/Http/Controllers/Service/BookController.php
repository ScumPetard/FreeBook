<?php

namespace App\Http\Controllers\Service;

use App\Repository\BookRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Ajax分页
     */
    public function ajaxPaginate(Request $request)
    {
        try {
            $books = $this->bookRepository->paginate(9)->toArray();
            return $books;
        } catch (\Exception $exception){
            return tojson(['code' => 0, 'message' => '获取失败~']);
        }
    }
}
