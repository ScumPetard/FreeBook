<?php

namespace App\Http\Controllers\Service;

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
     * 校验 Email 是否唯一
     *
     * @param Request $request
     */
    public function emailUnique(Request $request)
    {
        try {

            $email = $request->get('email');
            if (!$email) {
                return tojson(['code' => 0, 'message' => '请输入正确的邮箱地址']);
            }
            if ($this->memberRepository->emailUnique($email)) {
                return tojson(['code' => 0, 'message' => '此邮箱已被使用']);
            }
            return tojson(['code' => 1, 'message' => '恭喜您,该邮箱可以使用~']);

        } catch (\Exception $exception) {
            return tojson(['code' => 0, 'message' => '服务器内部错误']);
        }
    }


}
