<?php

namespace App\Http\Controllers\Service;

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

    public function changeAvatar(Request $request)
    {
        try {
            /** @var 获取文件资源 $imageResource */
            $imageResource = Tools::fileMove($request,'avatar','member-avatar');

            /** 判断是否上传成功 */
            if ($imageResource) {

                /** 裁剪文件 */
                Tools::tailoringImages($imageResource->filePath,200);

                /** 上传至七牛云 */
                $imagePath = Tools::uploadQiniu($imageResource->filePath,time().$imageResource->fileName,'member-avatar');

                if (!$imagePath) {
                    return tojson(['code' => 0, 'message' => '图片上传失败']);
                }

                /** @var 获取用户实例 $member */
                $member = $this->memberRepository->find(Session::get('member')->id);

                $member->avatar = $imagePath;
                $member->save();

                return tojson(['code' => 1, 'url' => $member->avatar]);
            }
            return tojson(['code' => 0, 'message' => '图片上传失败']);
        } catch (\Exception $exception){
            return tojson(['code' => 0, 'message' => '服务器内部错误']);
        }
    }
}
