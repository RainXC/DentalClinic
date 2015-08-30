<?php namespace App\Services\Models;

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
    protected $table = 'services_categories';
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
     * @return Services
     */
    public function items()
    {
        return $this->hasMany(Service::class, 'categoryId', 'id');
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

    public function getMinPrice()
    {
        $res = DB::table('services')
                    ->whereIn('categoryId', array_merge($this->subCategoriesArray(), [$this->id]))
                    ->min('price');
        return $res;
    }

    public function getMaxPrice()
    {
        $res = DB::table('services')
                    ->whereIn('categoryId', array_merge($this->subCategoriesArray(), [$this->id]))
                    ->max('price');
        return $res;
    }
}
