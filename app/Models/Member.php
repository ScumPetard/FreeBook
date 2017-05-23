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
}
