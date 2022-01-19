<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string $label 菜单名称
 * @property int $pid 父id
 * @property int|null $sort 排序
 * @property int $platform 平台 1: 后台 2: 前台
 * @property string|null $icon 图标
 * @property string|null $route 路由
 * @property int $status 状态 1: 启用 0:禁用
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
	protected $table = 'menus';

	protected $casts = [
		'pid' => 'int',
		'sort' => 'int',
		'platform' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'label',
		'pid',
		'sort',
		'platform',
		'icon',
		'route',
		'status'
	];
}
