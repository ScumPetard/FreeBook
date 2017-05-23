<?php

namespace App\Http\Controllers\Home;

use App\Repository\MemberRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SignController extends Controller
{
    function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }


    /**
     * 用户登录
     */
    public function sign()
    {
        return view('home.sign.sign');
    }

    /**
     * 注册
     *
     * @param Request $request
     * @return $this
     * \Illuminate\Contracts\View\Factory
     * \Illuminate\Http\RedirectResponse
     * \Illuminate\Routing\Redirector
     * \Illuminate\View\View
     */
    public function signUp(Request $request)
    {
        try {
            if ($request->isMethod('get')) {
                return view('home.sign.signup');
            }

            /** 用户名校验 */
            $name = $request->get('name');
            $email = $request->get('email');
            $password = $request->get('password');
            $confirm = $request->get('confirmpassword');

            if (!$name || !$email || !$password || !$confirm) {
                throw new \Exception('注册信息不能为空');
            }

            if (strlen($name) > 24 || strlen($email) > 20 || strlen($password) > 20) {
                throw new \Exception('字段过长');
            }

            if ($password !== $confirm) {
                throw new \Exception('两次输入密码不同');
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'confirm_token' => str_random(16)
            ];

            $member = $this->memberRepository->create($data);

            if (!$member) {
                throw new \Exception('注册失败!');
            }

            $result = Tools::sendEmail('signup', ['token' => $member->confirm_token, 'name' => $member->name,], $member->email);

            if ($result) {
                return Tools::notifyTo('注册成功!', 'success',"/member/signup-success/{$member->id}");
            }
            throw new \Exception('注册失败!');
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    public function signUpSuccess(Request $request,$id)
    {
        try {
            $member = $this->memberRepository->find($id);

            if (!$member) {
                throw new \Exception('不存在的用户!');
            }

            if ($member->is_confirmed == 1) {
                throw new \Exception('用户状态错误');
            }
            if ($request->isMethod('get')) {
                return view('home.sign.sign-success');
            }


        } catch (\Exception $exception){
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /** 用户验证邮箱 */
    public function signUpVerify($token)
    {
        try {

            $member = $this->memberRepository->emailVerify($token);

            if (!$member) {
                return 'error';
            }

            if ($member->is_confirmed == 1) {
                return 'error';
            }
            $member->is_confirmed = 1;
            $member->confirm_token = str_random(16);
            $member->save();
            return 'success';
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }

    }
}
