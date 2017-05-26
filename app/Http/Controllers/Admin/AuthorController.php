<?php

namespace App\Http\Controllers\Admin;


use App\Repository\AuthorRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * 作者管理 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        try {
            /** 获取资源 */
            $authors = $this->authorRepository->selectAll();
            return view('admin.author.index',compact('authors'));
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /**
     * 添加
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        try {

            /** @var 获取文件资源 $imageResource */
            $imageResource = Tools::fileMove($request,'avatar','author-avatar');

            /** 判断是否上传成功 */
            if ($imageResource) {

                /** 裁剪文件 */
                Tools::tailoringImages($imageResource->filePath,150);

                /** 上传至七牛云 */
                $imagePath = Tools::uploadQiniu($imageResource->filePath,time().$imageResource->fileName,'author-avatar');

                /** 判断图片是否上传成功 */
                if (!$imagePath) {
                    throw new \Exception('图片上传失败');
                }

                /** 拼接数组 */
                $data = $request->all();
                $data['avatar'] = $imagePath;

                /** 建立作者 */
                $author = $this->authorRepository->create($data);

                if ($author) {
                    return Tools::notifyTo('添加成功');
                }
                throw new \Exception('添加失败');

            }
            throw new \Exception('图片上传失败');

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /**
     * 编辑
     *
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit(Request $request,$id)
    {
        try {
            /** @var 获取资源 $data */
            $data = $request->all();

            /** @var 获取文件资源 $imageResource */
            $imageResource = Tools::fileMove($request,'avatar','author-avatar');

            /** 判断是否上传Preview */
            if ($imageResource) {

                /** 裁剪文件 */
                Tools::tailoringImages($imageResource->filePath,150);

                /** 上传至七牛云 */
                $imagePath = Tools::uploadQiniu($imageResource->filePath,time().$imageResource->fileName,'author-avatar');

                /** 判断图片是否上传成功 */
                if (!$imagePath) {
                    throw new \Exception('图片上传失败');
                }

                $data['avatar'] = $imagePath;
            }

            unset($data['_token']);
            /** Update DAta */
            $this->authorRepository->update($id,$data);

            return Tools::notifyTo('修改成功');
        } catch (\Exception $exception){
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /**
     * 删除作者
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->authorRepository->destroy($id);
        return Tools::notifyTo('删除成功');
    }
}
