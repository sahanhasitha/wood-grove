<?php

/**
 * Author: Spera Labs/(+94)112 144 533
 * Email: hello@speralabs.com
 * File Name: ProductService.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */

namespace domain\ImageService;

use App\EventImage;
use App\Image;
use Illuminate\Support\Facades\Auth;
use domain\Facades\ImagesFacade;
use App\Product;
use App\ProductImage;
use App\ReservationImage;
use App\ServiceImage;

/**
 * Admin side Product service
 * Class ProductService
 * @product domain\Product
 */
class ImageService
{

    protected $product_image;
    protected $service_image;
    protected $reservation_image;
    protected $event_image;
    protected $image;

    const THUMB_FOLDER = "uploads/thumb/";



    public function __construct()
    {
        $this->product_image = new ProductImage();
        $this->service_image = new ServiceImage();
        $this->reservation_image = new ReservationImage();
        $this->event_image = new EventImage();
        $this->image = new Image();
    }


    public function all(){
        return $this->product_image->all();
    }
    public function get($id)
    {
        return $this->product_image->find($id);
    }
    public function getProduct($id)
    {
        return $this->product_image->where('image_id', $id)->first();
    }
    public function getService($id)
    {
        return $this->service_image->where('image_id', $id)->first();
    }
    public function getReservation($id)
    {
        return $this->reservation_image->where('image_id', $id)->first();
    }
    public function getEvent($id)
    {
        return $this->event_image->where('image_id', $id)->first();
    }
    //getting records
    public function getImagerecord($id)
    {
        return $this->image->find($id);
    }
    public function make($data)
    {
        return $this->create($data);
    }
    //delete
    public function destroy($id)
    {
        $product = $this->get($id);
        return $product->delete();
    }
    //delete gallery images
    public function deleteProductImage($id)
    {
        $product_image = $this->getImagerecord($id);
        $productOfDeletedImage= $this->getProduct($id);
        $product_image->delete();
        //delete image from server
        if (file_exists(config('images.upload_path')."/$product_image->name")) {
            @unlink(config('images.upload_path')."/$product_image->name");
            @unlink(config('images.upload_path')."/thumb/150x150/$product_image->name");
            @unlink(config('images.upload_path')."/thumb/250x225/$product_image->name");
            @unlink(config('images.upload_path')."/thumb/254x185/$product_image->name");
            @unlink(config('images.upload_path')."/thumb/270x240/$product_image->name");
            @unlink(config('images.upload_path')."/thumb/270x280/$product_image->name");
            @unlink(config('images.upload_path')."/thumb/370x310/$product_image->name");
        }
        return $productOfDeletedImage;

    }
    public function deleteServiceImage($id)
    {
        $service_image = $this->getImagerecord($id);
        $serviceOfDeletedImage = $this->getService($id);
        $service_image->delete();
        //delete image from server
        if (file_exists(config('images.upload_path') . "/$service_image->name")) {
            @unlink(config('images.upload_path') . "/$service_image->name");
            @unlink(config('images.upload_path') . "/thumb/150x150/$service_image->name");
            @unlink(config('images.upload_path') . "/thumb/250x225/$service_image->name");
            @unlink(config('images.upload_path') . "/thumb/254x185/$service_image->name");
            @unlink(config('images.upload_path') . "/thumb/270x240/$service_image->name");
            @unlink(config('images.upload_path') . "/thumb/270x280/$service_image->name");
            @unlink(config('images.upload_path') . "/thumb/370x310/$service_image->name");
        }
        return $serviceOfDeletedImage;
    }
    public function deleteReservationImage($id)
    {
        $reservation_image = $this->getImagerecord($id);
        $reservationOfDeletedImage = $this->getReservation($id);
        $reservation_image->delete();
        //delete image from server
        if (file_exists(config('images.upload_path') . "/$reservation_image->name")) {
            @unlink(config('images.upload_path') . "/$reservation_image->name");
            @unlink(config('images.upload_path') . "/thumb/150x150/$reservation_image->name");
            @unlink(config('images.upload_path') . "/thumb/250x225/$reservation_image->name");
            @unlink(config('images.upload_path') . "/thumb/254x185/$reservation_image->name");
            @unlink(config('images.upload_path') . "/thumb/270x240/$reservation_image->name");
            @unlink(config('images.upload_path') . "/thumb/270x280/$reservation_image->name");
            @unlink(config('images.upload_path') . "/thumb/370x310/$reservation_image->name");
        }
        return $reservationOfDeletedImage;
    }
    public function deleteEventImage($id)
    {
        $event_image = $this->getImagerecord($id);
        $eventOfDeletedImage = $this->getEvent($id);
        $event_image->delete();
        //delete image from server
        if (file_exists(config('images.upload_path') . "/$event_image->name")) {
            @unlink(config('images.upload_path') . "/$event_image->name");
            @unlink(config('images.upload_path') . "/thumb/150x150/$event_image->name");
            @unlink(config('images.upload_path') . "/thumb/250x225/$event_image->name");
            @unlink(config('images.upload_path') . "/thumb/254x185/$event_image->name");
            @unlink(config('images.upload_path') . "/thumb/270x240/$event_image->name");
            @unlink(config('images.upload_path') . "/thumb/270x280/$event_image->name");
            @unlink(config('images.upload_path') . "/thumb/370x310/$event_image->name");
        }
        return $eventOfDeletedImage;
    }

    public function update(Product $product, array $data)
    {
        $product->update($this->edit($product, $data));
    }
    protected function edit(Product $product, $data)
    {
        return array_merge($product->toArray(), $data);
    }

}
