<?php namespace App\Employees\Models;

use Eloquent;

/**
 * Class Employee
 *
 * @property \App\User                $author
 */
class Employee extends Eloquent {

	/**
	 * @var array
	 */
	protected $guarded = ['id', 'firstname'];
    /**
     * @var Speciality
     */
    protected $specialities;
    /**
     * @var array $employeeSpecialities
     */
    protected $employeeSpecialities;

    /**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo(Category::class, 'categoryId');
	}

    /**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function status()
	{
		return $this->belongsTo(Status::class, 'statusId');
	}

    /**
     * @return string
     */
    public function getName()
    {
        return $this->lastname.' '.$this->firstname.' '.$this->patronymic;
    }

    public function specialities()
    {
        return $this->belongsToMany('App\Employees\Models\Speciality', 'employees_specialities', 'employeeId', 'specialityId');
    }

    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'positionId');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'objectId', 'id');
    }

    public function isMale()
    {
        return (boolean)$this->male;
    }

    public function isFemale()
    {
        return !$this->isMale();
    }

    public function getAvatar( $size = null )
    {
        $no_avatar = $this->isMale()?'male.jpg':'female.jpg';
        $image = $this->image
            ? $this->image->getImage($size)
            : '/data/images/employees/no_avatar_'.$no_avatar;

        return $image;
    }
}
