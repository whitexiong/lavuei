<?php

namespace App\Models;

use App\Traits\HasCan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $subtitle
 * @property int|null $views
 * @property int|null $likes
 * @property int|null $unlikes
 * @property int|null $collects
 * @property string $body
 * @property int $categories_id
 * @property int $comments
 * @property int|null $public_date
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCategoriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCollects($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePublicDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUnlikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereViews($value)
 * @mixin \Eloquent
 * @property-read mixed $can
 * @property-write mixed $order_status
 * @property-read \App\Models\User $user
 */
class Article extends BaseModel
{
    use HasCan;

	protected $table = 'articles';

	protected $casts = [
		'user_id' => 'int',
		'views' => 'int',
		'likes' => 'int',
		'unlikes' => 'int',
		'collects' => 'int',
		'categories_id' => 'int',
		'comments' => 'int',
		'public_date' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'title',
		'subtitle',
		'views',
		'likes',
		'unlikes',
		'collects',
		'body',
		'categories_id',
		'comments',
		'public_date',
		'status'
	];

    protected $appends = [
        'can'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
