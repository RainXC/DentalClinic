<?php namespace App\Gallery\Views;

/**
 * Created by PhpStorm.
 * User: dmitricercel
 * Date: 01.11.16
 * Time: 20:58
 */
class AlbumsLandingView implements \JsonSerializable
{
    private $albums;
    private $array = [];

    public function __construct( $albums )
    {
        $this->albums = $albums;
    }

    public function get()
    {
        foreach ( $this->albums->get() as $album) {
            $images = [];
            foreach( $album->images as $image ) {
                array_push($images, [
                    'id'       => $image->id,
                    'filename' => $image->filename,
                    'title'    => $image->title,
                    'size'     => $image->size,
                    'mime'     => $image->mime,
                    'imageUrl' => $image->getImage('1280x960')
                ]);
            }

            array_push($this->array, [
                'name'        => $album->name,
                'description' => $album->description,
                'createdAt'   => $album->created_at,
                'images'      => $images
            ]);
        }
        return $this->array;
    }

    public function jsonSerialize()
    {
        return $this->get();
    }
}