<?php


namespace App\Models;

use DateTimeInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;


/**
 * Pcrm\Models\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel query()
 * @mixin Eloquent
 * @property-write mixed $order_status
 */
class BaseModel extends Authenticatable
{
    use HasFactory;

    public static function new(): BaseModel
    {
        return new static();
    }

    /**
     * 转时间， 重写 laravel8 时间默认返回 UTC 时间
     * @param  DateTimeInterface  $date
     * @return string
     */
    public function serializeDate(DateTimeInterface $date): string
    {
        return Carbon::instance($date)->toDateTimeString();
    }

    /**
     * 状态修改器
     * @param $value
     */
    public function setOrderStatusAttribute($value)
    {
        $this->attributes['status'] = strtolower($value);
    }
}
