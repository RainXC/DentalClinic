<?php
/**
 * Created by PhpStorm.
 * User: dmitricercel
 * Date: 30.10.16
 * Time: 17:42
 */

namespace App\Employees\Views;


class EmployeesView implements \JsonSerializable
{
    private $employees;
    private $array = [];

    public function __construct( $employees )
    {
        $this->employees = $employees;
        $this->employees->orderBy('priority', 'ASC');
    }

    public function get()
    {
        foreach ( $this->employees->get() as $employee) {
            $specs = [];
            foreach( $employee->specialities as $spec ) {
                array_push($specs, [
                    'id' => $spec->id,
                    'name' => $spec->name
                ]);
            }


            array_push($this->array, [
                'firstname' => $employee->firstname,
                'lastname'  => $employee->lastname,
                'category'  => $employee->getCategory(),
                'position'  => $employee->getPosition(),
                'specialities' => $specs,
                'avatar'    => $employee->getAvatar('150x150'),
            ]);
        }
        return $this->array;
    }

    public function jsonSerialize()
    {
        return $this->get();
    }
}