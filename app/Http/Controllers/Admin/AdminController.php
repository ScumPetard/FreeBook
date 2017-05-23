<?php

namespace App\Http\Controllers\Admin;

use App\Repository\Admin\AdminRepository;
use App\Repository\Admin\PermissionRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct(AdminRepository $adminRepository, PermissionRepository $permissionRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->permissionRepository = $permissionRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $admins = $this->adminRepository->selectAll();

            $permissions = $this->permissionRepository->selectAll();

            return view('admin.admin.index', compact('admins', 'permissions'));

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $email = $request->get('email');

            if ($this->adminRepository->checkEmailUnique($email)) {
                throw new \Exception('此邮箱已存在,请更换一个邮箱');
            }

            $avatarResource = Tools::fileMove($request, 'avatar', 'admin-avatar');

            if (!$avatarResource) {
                throw new \Exception('管理员头像上传失败,请重试');
            }

            Tools::tailoringImages($avatarResource->filePath,50);

            $admin = $this->adminRepository->create([
                'avatar' => '/' . $avatarResource->filePath,
                'name' => $request->get('name'),
                'email' => $email,
                'password' => $request->get('password'),
                'enable' => $request->get('enable')
            ]);

            if (!$admin) {
                throw new \Exception('创建失败,服务器内部错误,请重试');
            }

            /** @var 获取已选择权限 $permissions */
            $permissions = $request->get('permission');

            if (count($permissions)) {
                foreach ($permissions as $permission) {
                    $admin->attachPermission($permission);
                }
            }

            return Tools::notifyTo("成功添加了管理员 [{$admin->name}]");

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        try {

            $email = $request->get('email');

            /* 取出管理员 */
            $admin = $this->adminRepository->find($id);

            if ($email !== $admin->email) {
                if ($this->adminRepository->checkEmailUnique($email)) {
                    throw new \Exception('此邮箱已存在,请更换一个邮箱');
                }
            }

            /* 移除所有权限 */
            $admin->detachAllPermissions();

            /** @var 获取已选择权限 $permissions */
            $permissions = $request->get('permission');

            /* 赋予权限 */
            if (count($permissions)) {
                foreach ($permissions as $permission) {
                    $admin->attachPermission($permission);
                }
            }

            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->enable = $request->get('enable');

            if ($request->get('password')) {
                $admin->password = $request->get('password');
            }

            $avatarResource = Tools::fileMove($request, 'avatar', 'admin-avatar');

            if ($avatarResource) {
                Tools::tailoringImages($avatarResource->filePath,50);
                $admin->avatar = '/' . $avatarResource->filePath;
            }

            $admin->save();

            return Tools::notifyTo("操作成功 , 管理员 [{$admin->name}] 的信息已成功修改");
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            if (Auth::user()->id == $id) {
                return Tools::notifyTo('你不能删除自己 !', 'error');
            }

            $admin = $this->adminRepository->find($id);
            $admin->detachAllPermissions();
            $admin->delete();

            return Tools::notifyTo('操作成功 , 成功删除了一个管理员');

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(),'error');
        }
    }
}
