<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * 前台用户
 *
 * Class Member
 * @package App\Models
 */
class Member extends Model
{
    protected $table = 'members';

    protected $fillable =
        [
            'avatar',     // 头像
            'name',      // 昵称
            'email',      //邮箱
            'password',       // 密码
            'enable',   // 是否启用,默认启用
            'praise_count',   //用户赞的数量
            'is_confirmed',    // 用户是否激活账户 0 => 未激活 1 => 激活
            'confirm_token',    // 注册Token
            'reset_token',    // 找回密码Token
        ];

    /**
     * 人性化显示添加时间
     *
     * @param $date
     * @return string|static
     */
    public function getCreatedAtAttribute($date)
    {
        if (Carbon::now() > Carbon::parse($date)->addDays(10)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }

    /**
     * 人性化显示修改时间
     *
     * @param $date
     * @return string|static
     */
    public function getUpdatedAtAttribute($date)
    {
        if (Carbon::now() > Carbon::parse($date)->addDays(10)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }

    /**
     * 读取赞时对赞进行格式化
     * @param $praise_count
     * @return string
     */
    public function getPraiseCountAttribute($praise_count)
    {
        return number_format($praise_count);
    }

    /**
     * 在将密码存入数据库时进行 Hash 加密
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
