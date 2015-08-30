<?php namespace App\Employees\Models;

use Eloquent;
use App\User;

/**
 * Class Status
 *
 * @property \App\User                $author
 */
class EmployeeSpecialities extends Eloquent {

    /**
     * @var Employee
     */
    protected $employee;

    /**
     * @var string
     */
    protected $table = 'employees_specialities';

    /**
     * @var array
     */
    protected $guarded = ['id'];


    /**
     * @return Employee
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @return mixed
     */
    public function details()
    {
        return $this->hasOne(Speciality::class, 'id', 'specialityId');
    }


}
