<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $article_id
 * @property string $body
 * @property int|null $pid
 * @property int|null $likes
 * @property int|null $unlikes
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUnlikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
	protected $table = 'comments';

	protected $casts = [
		'user_id' => 'int',
		'article_id' => 'int',
		'pid' => 'int',
		'likes' => 'int',
		'unlikes' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'article_id',
		'body',
		'pid',
		'likes',
		'unlikes',
		'status'
	];
}
