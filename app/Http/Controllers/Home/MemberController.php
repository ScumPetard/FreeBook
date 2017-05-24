<?php

namespace App\Http\Controllers\Home;

use App\Repository\MemberRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
}
