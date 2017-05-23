<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        try {
            return view('admin.book.index');
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }
}
