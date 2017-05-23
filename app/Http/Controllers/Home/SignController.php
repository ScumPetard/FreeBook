<?php

namespace App\Http\Controllers\Home;

use App\Tools\Tools;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SignController extends Controller
{

    /**
     * 用户登录
     */
    public function sign()
    {
//        Tools::sendEmail('signup',['token' => 'asdasdasd','name' => 'Petard'],'13617622968@163.com');
        return view('home.sign.sign');
    }

    public function signUp()
    {
        return view('home.sign.signup');
    }
}
