<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * 图书
 *
 * Class Book
 * @package App\Models
 */
class Book extends Model
{
    protected $table = 'books';

    protected $fillable =
        [
            'name',     // 书名
            'preview',      // 封面
            'intro',      //简介
            'author_id',      //作者ID
            'click_count',       // 点击量
            'favorite_count',   // 关注数
            'praise_count',   //赞数量
            'enable',    // 是否启用 0 => 否 1 => 是
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
     * 读取点击数时对点击数进行格式化
     * @param $praise_count
     * @return string
     */
    public function getClickCountAttribute($click_count)
    {
        return number_format($click_count);
    }

    /**
     * 读取收藏数时对收藏数进行格式化
     * @param $praise_count
     * @return string
     */
    public function getFavoriteCountAttribute($favorite_count)
    {
        return number_format($favorite_count);
    }

    /** 作者 */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
