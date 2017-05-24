<?php

namespace App\Http\Controllers\Home;

use App\Repository\MemberRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * 个人中心
     */
    public function center()
    {
        try {
            $member = $this->memberRepository->find(\Session::get('member')->id);
            return view('home.member.center', compact('member'));
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /** 修改资料 */
    public function data(Request $request)
    {
        try {

            /** Get 请求 */
            if ($request->isMethod('get')) {
                $member = $this->memberRepository->find(Session::get('member')->id);
                return view('home.member.data',compact('member'));
            }

            /** 组件数据 */
            $data = [
                'name' => $request->get('name'),
                'intro' => $request->get('intro')
            ];
            $result = $this->memberRepository->setData($data,Session::get('member')->id);
            if ($result) {
                return Tools::notifyTo('修改资料成功','success');
            }
            throw new \Exception('修改资料失败');
        } catch (\Exception $exception){
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /** 我的分享 */
    public function share()
    {

    }
}
