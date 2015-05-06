<?php namespace LaravelRU\Articles\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DifficultyLevel
 *
 * @property \Illuminate\Database\Eloquent\Collection $articles
 */
class DifficultyLevel extends \Eloquent {

	use SoftDeletes;

	/**
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * @var array
	 */
	protected $fillable = [
		'title', 'slug'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function articles()
	{
		return $this->hasMany(Article::class);
	}
}
