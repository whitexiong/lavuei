<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ArticleHistoryVersion
 *
 * @property int $id
 * @property int $user_id 编辑人
 * @property int $article_id 文章id
 * @property string $title 标题
 * @property string $subtitle 副标题
 * @property string $body 文章内容
 * @property string $add_body 添加内容
 * @property string $delete_body 删除内容
 * @property int $type 1:新增; 2: 删除
 * @property int $status 1: 启用 0:禁用
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereAddBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereDeleteBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleHistoryVersion whereUserId($value)
 * @mixin \Eloquent
 */
class ArticleHistoryVersion extends Model
{
	protected $table = 'article_history_version';

	protected $casts = [
		'user_id' => 'int',
		'article_id' => 'int',
		'type' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'article_id',
		'title',
		'subtitle',
		'body',
		'add_body',
		'delete_body',
		'type',
		'status'
	];
}
