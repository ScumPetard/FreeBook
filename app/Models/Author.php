<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/***
 * 作者
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
        'name',
        'avatar',
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

    /** 书籍 */
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
