<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TagMapArticle
 *
 * @property int $tag_id
 * @property int $article_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TagMapArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TagMapArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TagMapArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder|TagMapArticle whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagMapArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagMapArticle whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagMapArticle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TagMapArticle extends Model
{
	protected $table = 'tag_map_articles';
	public $incrementing = false;

	protected $casts = [
		'tag_id' => 'int',
		'article_id' => 'int'
	];

	protected $fillable = [
		'tag_id',
		'article_id'
	];
}
