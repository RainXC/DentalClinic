<?php namespace App\Employees\Models;

use Eloquent;
use App\User;

/**
 * Class Status
 *
 * @property \App\User                $author
 */
class Image extends Eloquent {

    /**
     * @var string
     */
    protected $folder = '/data/images/employees/';

    /**
     * @var string
     */
    protected $table = 'employees_images';
	/**
	 * @var array
	 */
	protected $guarded = ['id', 'author_id'];

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getFilepath()
    {
        return $this->folder.$this->getFilename();
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->getFilepath();
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
