<?php namespace App\Employees\Models;

use Eloquent;
use App\User;
use Illuminate\Support\Facades\DB;

/**
 * Class Status
 *
 * @property \App\User                $author
 */
class Category extends Eloquent{

    /**
     * @var string
     */
    protected $table = 'employees_categories';
	/**
	 * @var array
	 */
	protected $guarded = ['id', 'author_id'];
    /**
     * @var array
     */
    protected $subCategoriesArray = [];

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
     * @return Employees
     */
    public function items()
    {
        return $this->hasMany(Employee::class, 'categoryId', 'id');
    }

    /**
     * @return Categoeis
     */
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parentId', 'id');
    }

    /**
     * @return array
     */
    public function subCategoriesArray()
    {
        if ( !$this->subCategoriesArray ) {
            foreach( $this->subCategories as $category ) {
                array_push($this->subCategoriesArray, $category->id);
            }
        }
        return $this->subCategoriesArray;
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
}
