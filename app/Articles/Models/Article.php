<?php namespace LaravelRU\Articles\Models;

use Eloquent;
use LaravelRU\Core\Models\Version;
use LaravelRU\Likes\LikeableTrait;
use LaravelRU\Comment\CommentableTrait;
use LaravelRU\Comment\CommentableInterface;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;
use LaravelRU\User\Models\User;
use LaravelRU\Articles\Presenters\ArticlePresenter;

/**
 * Class Article
 *
 * @property \LaravelRU\Core\Models\Version             $framework_version
 * @property \LaravelRU\User\Models\User                $author
 * @property \LaravelRU\Articles\Models\DifficultyLevel $difficulty_version
 */
class Article extends Eloquent implements CommentableInterface {

	use CommentableTrait, SoftDeletes, LikeableTrait, PresentableTrait;

	/**
	 * @const string
	 */
	const PUBLISHED_AT = 'published_at';

	/**
	 * @var array
	 */
	protected $guarded = ['id', 'author_id'];

	/**
	 * @var array
	 */
	protected $dates = ['deleted_at', self::PUBLISHED_AT];

	/**
	 * @var string
	 */
	protected $presenter = ArticlePresenter::class;

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		return $this->belongsTo(User::class, 'author_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function framework_version()
	{
		return $this->belongsTo(Version::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function difficulty_version()
	{
		return $this->belongsTo(DifficultyLevel::class);
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeDraft($query)
	{
		return $query->where('is_draft', 1);
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeNotDraft($query)
	{
		return $query->where('is_draft', 0);
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeWithAuthor($query)
	{
		return $query->with('author');
	}

	/**
	 * @param        $query
	 * @param string $sortOrder
	 * @return mixed
	 */
	public function scopeOrderByDatePublished($query, $sortOrder = 'desc')
	{
		return $query->orderBy(self::PUBLISHED_AT, $sortOrder);
	}
}
