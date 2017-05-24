<?php

namespace App\Http\Controllers\Home;

use App\Repository\MemberRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignController extends Controller
{
    function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }


    /**
     * 用户登录
     */
    public function sign(Request $request)
    {
        try {

            /** Get 方式请求 */
            if ($request->isMethod('get')) {
                return view('home.sign.sign');
            }

            /** @var 获取输入参数 $email */
            $email = $request->get('email');
            $password = $request->get('password');

            if (!$email || !$password) {
                throw new \Exception('请输入完整信息');
            }

            /** @var 查询条件 $where */
            $where = [
                'email' => $email,
                'enable' => 1,
                'is_confirmed' => 1,
            ];

            /** @var 登录 $member */
            $member = $this->memberRepository->sign($where);

            if (!$member) {
                throw new \Exception('账号信息错误或者没有验证邮件');
            }

            if (!Hash::check($password,$member->password)) {
                throw new \Exception('密码错误');
            }

            Session::put('member',$member);

            return Tools::notifyTo("{$member->name},欢迎回来",'success','/member/center');

        } catch (\Exception $exception){
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }


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
            /** Get 请求 */
            if ($request->isMethod('get')) {
                return view('home.sign.signup');
            }

            /** 用户名校验 */
            $name = $request->get('name');
            $email = $request->get('email');
            $password = $request->get('password');
            $confirm = $request->get('confirmpassword');

            /** 判断 全不能为空 */
            if (!$name || !$email || !$password || !$confirm) {
                throw new \Exception('注册信息不能为空');
            }

            /** 判断长度 */
            if (strlen($name) > 24 || strlen($email) > 20 || strlen($password) > 20) {
                throw new \Exception('字段过长');
            }

            /** 判断密码是否相等 */
            if ($password !== $confirm) {
                throw new \Exception('两次输入密码不同');
            }

            /** @var 组件数据 $data */
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'confirm_token' => str_random(16)
            ];

            /** @var 创建用户 $member */
            $member = $this->memberRepository->create($data);

            /** 判断是否注册成功 */
            if (!$member) {
                throw new \Exception('注册失败!');
            }

            /** @var 邮件数组 $bind_data */
            $bind_data = ['token' => $member->confirm_token, 'name' => $member->name];

            /** @var 发送邮件 $result */
            $result = Tools::sendEmail('signup', $bind_data, $member->email);

            /** 判断邮件是否发送成功 */
            if ($result) {

                /** Put 重发邮件验证Session */
                Session::put('signup-success',$member->id);
                return Tools::notifyTo('注册成功!', 'success',"/member/signup-success/{$member->id}");
            }

            /** 邮件发送失败 */
            /** 删除会员 */
            $member->delete();

            throw new \Exception('注册失败!');

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /** 注册成功 */
    public function signUpSuccess(Request $request,$id)
    {
        try {

            $member = $this->memberRepository->find($id);

            /** 判断是否有这个用户 */
            if (!$member) {
                throw new \Exception('不存在的用户!');
            }

            /** 判断是否未验证 */
            if ($member->is_confirmed == 1) {
                throw new \Exception('用户状态错误');
            }

            /** 判断是否是刚注册的用户 */
            if (!Session::has('signup-success')) {
                throw new \Exception('用户状态错误');
            }

            /** Get 方式请求 */
            if ($request->isMethod('get')) {
                return view('home.sign.sign-success');
            }

            /** @var 重新发送邮件 $result */
            $result = Tools::sendEmail('signup', [
                'token' => $member->confirm_token,
                'name' => $member->name,],
                $member->email
            );

            if ($result) {
                Session::forget('signup-success');
                return view('home.sign.signup-resetemail');
            }

            throw new \Exception('邮件发送失败,请重试');

        } catch (\Exception $exception){
            return Tools::notifyTo($exception->getMessage(),'danger','/member/signup');
        }
    }

    /** 用户验证邮箱 */
    public function signUpVerify($token)
    {
        try {

            /** @var 获取用户 $member */
            $member = $this->memberRepository->emailVerify($token);

            /** 检查用户是否存在 */
            if (!$member) {
                throw new \Exception('不存在的用户');
            }

            /** 判断状态是否正确 */
            if ($member->is_confirmed == 1) {
                throw new \Exception('用户状态错误');
            }

            /** @var 修改信息 is_confirmed */
            $member->is_confirmed = 1;
            $member->confirm_token = str_random(16);
            $member->save();
            Session::put('member',$member);

            /** 抛出成功视图 */
            return view('home.sign.signup-verifysuccess');
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(),'danger','/member/sign');
        }

    }

    /** 退出 */
    public function signOut()
    {
        Session::forget('member');
        return Tools::notifyTo('你已经安全退出','success','/');
    }
}
