<?php namespace App\Gallery\Models;

use Eloquent;

/**
 * Class Gallery
 *
 */
class Album extends Eloquent {

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
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		return $this->belongsTo(User::class, 'author_id');
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
     * @return hasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'objectId', 'id');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function delete()
    {
        return parent::delete();
    }
}
