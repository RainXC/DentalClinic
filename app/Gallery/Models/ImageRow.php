<?php namespace App\Gallery\Models;

use Eloquent;
use Intervention\Image\Facades\Image;

/**
 * Class Gallery
 *
 */
class ImageRow extends Eloquent {

    /**
     * @var string
     */
    protected $table = 'album_images';

    /**
     * @var string
     */
    private $imagesFolder = '';

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

    public function __construct() {
        $this->imagesFolder = storage_path() . '/files/';
    }

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

    public function getPath()
    {
        return $this->imagesFolder.$this->getId().'.'.$this->getExt();
    }

    public function getImageUrl($template)
    {
        return '/img/cache/'.$template.'/'.$this->getId().'.'.$this->getExt().'/';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getExt()
    {
        return $this->ext;
    }

}
