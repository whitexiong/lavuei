<?php


namespace App\Models;

use App\Traits\HasCan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ArticleHistoryVersion
 *
 * @property int $id
 * @property int $user_id 编辑人
 * @property int $article_id 文章id
 * @property string $title 标题
 * @property string $subtitle 副标题
 * @property string $origin_body 原文本
 * @property string $target_body 新文本
 * @property int $status 1: 启用 0:禁用
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereOriginBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereTargetBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereUserId($value)
 * @mixin \Eloquent
 * @property-read mixed $can
 * @property-write mixed $order_status
 */
class ArticleHistoryVersion extends BaseModel
{

    use HasCan;

	protected $table = 'article_history_version';

	protected $casts = [
		'user_id' => 'int',
		'article_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'article_id',
		'title',
		'subtitle',
		'origin_body',
		'target_body',
		'status'
	];

    protected $appends = [
        'can'
    ];
}
