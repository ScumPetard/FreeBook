<?php

namespace App\Http\Controllers\Admin;

use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{
    public function login(Request $request)
    {
        try {

            /** 检查登录次数 */
            if (Session::has('signVerifyNum'))
            {
                $signVerifyNum = Session::get('signVerifyNum');

                if ($signVerifyNum >= 3)
                {
                    throw new \Exception("你的登陆失败次数已大于{$signVerifyNum}次,无法登录!");
                }
            }

            /** Get 方式 抛出View */
            if ($request->isMethod('get')) {
                return view('admin.index.login');
            }

            /** 登录 */
            if (Auth::attempt([
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'enable' => 1]
            ))
            {
                Session::forget('signVerifyNum');
                $adminName = Auth::user()->name;
                return Tools::notifyTo("欢迎登陆 ~ [{$adminName}]", 'info', '/admin/index');
            }

            /** 登录失败,次数+1 */
            if (Session::has('signVerifyNum')) {
                Session::put('signVerifyNum', Session::get('Session') + 1);
            } else {
                Session::put('signVerifyNum', 1);
            }

            $remainingVerify = 3 - Session::get('signVerifyNum');

            return Tools::notifyTo(
                "登录失败,此账号被停用或账号错误,你还有{$remainingVerify}次登录机会~",
                'error'
            );

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return Tools::notifyTo('你已经安全退出', 'info', '/admin');
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }

    public function index()
    {
        return view('admin.index.index');
    }

}
