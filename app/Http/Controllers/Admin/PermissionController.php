<?php

namespace App\Http\Controllers\Admin;

use App\Repository\PermissionRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permissionRepository->selectAll();
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $slug = $request->get('slug');

            if ($this->permissionRepository->checkSlugUnique($slug)) {
                throw new \Exception('此权限路由已存在');
            }

            $this->permissionRepository->create($request->all());

            return Tools::notifyTo('添加成功 ~');

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
            $slug = $request->get('slug');


            $permission = $this->permissionRepository->find($id);

            if ($permission->slug !== $slug) {
                if ($this->permissionRepository->checkSlugUnique($slug)) {
                    throw new \Exception('此权限路由已存在');
                }
            }

            unset($request['_token']);

            $this->permissionRepository->update($id,$request->all());

            return Tools::notifyTo('修改成功');
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

            $this->permissionRepository->destroy($id);
            return Tools::notifyTo('删除成功');
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }
}
