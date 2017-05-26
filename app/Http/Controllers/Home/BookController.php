<?php

namespace App\Http\Controllers\Home;

use App\Repository\BookRepository;
use App\Tools\Tools;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

//            /** @var  搜索条件 $where */
//            $where = [];
//            /** @var  $books */
//            $keyword = $request->get('keyword');
//
//            $books = $this->bookRepository->paginate(18);
            return view('home.book.index');
        } catch (\Exception $exception){
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

}
