<?php

namespace App\Tools;

use Illuminate\Support\Facades\Storage;
use Image;
use Mail;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Session;
use Naux\Mail\SendCloudTemplate;

class Tools
{
    public static function notifyTo($message = '操作成功', $type = 'info', $path = null)
    {
        Session::flash('notify_message', $message);
        Session::flash('notify_type', $type);

        if (is_null($path)) {
            return back()->withInput();
        }
        return redirect($path);
    }

    /**
     * 文件上传
     *
     * @param $request
     * @param $filename
     * @param $path
     * @return $this
     * bool\Illuminate\Http\RedirectResponse
     * \Illuminate\Routing\Redirector
     * \stdClass
     */
    public static function fileMove($request, $filename, $path)
    {
        try {
            if (!$request->hasFile($filename)) {
                return false;
            }

            $resource = new \stdClass();


            $resource->fileName = $request->file($filename)->getClientOriginalName();

            $request->file($filename)->move('uploads/' . $path, time() . $resource->fileName);

            $resource->filePath = 'uploads/' . $path . '/' . time() . $resource->fileName;

            return $resource;

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }

    /**
     * 图片裁剪
     *
     * @param $filepath
     * @param $width
     * @param null $height
     * @return $this
     * \Illuminate\Http\RedirectResponse
     * \Illuminate\Routing\Redirector
     */
    public static function tailoringImages($filepath, $width, $height = null)
    {
        try {

            if (is_null($height)) {
                $image = Image::make($filepath)->fit($width);
            } else {
                $image = Image::make($filepath)->resize($width, $height);
            }

            $image->save($filepath);

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }

    /**
     * 发送邮件
     *
     * @param $templateName
     * @param $bind_data
     * @param $mail
     */
    public static function sendEmail($templateName, $bind_data, $mail)
    {
        $template = new SendCloudTemplate($templateName, $bind_data);
        $result = Mail::raw($template, function ($message) use ($mail) {
            $message->from('FreeBook@Gmail.com', 'FreeBook');
            $message->to($mail);
        });
        return $result;
    }

    public static function uploadQiniu($filepath, $filename, $path)
    {
        try {
            /** @var 初始化七牛云 Disk $disk */
            $disk = Storage::disk('qiniu');

            /** @var 拼接保存路径 $path */
            $path = $path . '/' . $filename;

            /** @var 获取文件资源 $fileContents */
            $fileContents = file_get_contents($filepath);

            /** @var 上传至七牛云 $result */
            $result = $disk->put($path, $fileContents);

            if ($result) {
                return env('QINIU_DOMAIN').'/'.$path;
            }
            return false;
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }

    }
}