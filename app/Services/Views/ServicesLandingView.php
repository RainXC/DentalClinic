<?php namespace App\Services\Views;

/**
 * Created by PhpStorm.
 * User: dmitricercel
 * Date: 01.11.16
 * Time: 20:58
 */
class ServicesLandingView implements \JsonSerializable
{
    private $services;
    private $array = [];

    public function __construct( $services )
    {
        $this->services = $services;
    }

    public function get()
    {
        foreach ( $this->services->get() as $service) {
            array_push($this->array, [
                'name'        => $service->name,
                'description' => $service->description,
                'minPrice'    => $service->getMinPrice(),
                'maxPrice'    => $service->getMaxPrice(),
            ]);
        }
        return $this->array;
    }

    public function jsonSerialize()
    {
        return $this->get();
    }
}