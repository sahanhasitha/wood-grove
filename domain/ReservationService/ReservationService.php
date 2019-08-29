<?php

/**
 * Author: Spera Labs/(+94)112 144 533
 * Email: hello@speralabs.com
 * File Name: ServiceService.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */
namespace domain\ReservationService;

use domain\Facades\ImagesFacade;
use App\Company;
use App\Reservation;
use App\ReservationImage;

/**
 * Admin side ServiceService
 * Class ServiceService
 * @Company domain\ServiceService
 */
class ReservationService
{
    protected $reservation;
    protected $reservation_image;

    public function __construct()
    {
        $this->reservation = new Reservation();
        $this->reservation_image = new ReservationImage();
    }
    public function all()
    {
        return $this->reservation->all();
    }

    public function get($id)
    {
        return $this->reservation->find($id);
    }
    public function getImages($id)
    {
        return $this->reservation_image->where('reservation_id', $id)->get();
    }
    public function find($id)
    {
        return $this->reservation->find($id);
    }
    public function updateReservation($request)
    {
        $reservation = $this->get($request['reservation_id']);
        $this->update($reservation, $request);
    }
    public function destroy($id)
    {
        $reservation = $this->get($id);
        $reservation->delete();
        return $this->reservation->all();
    }
    public function uploadReservationImage($request)
    {
        $reservation = $this->get($request->reservation_id);
        $name = str_replace(' ', '-', $request['image_name']);
        $data = $request->all();
        $image = ImagesFacade::up($request['image'], [2, 12, 9, 10, 13, 14], $name);
        $this->reservation_image->create([
            'image_id' => $image->id,
            'reservation_id' => $reservation->id,
        ]);
        return $reservation->id;
    }
    public function make($data)
    {
        return $this->create($data);
    }
    public function create($data)
    {
        return $this->reservation->create($data);
    }
    public function update(Reservation $reservation, array $data)
    {
        $reservation->update($this->edit($reservation, $data));
    }
    protected function edit(Reservation $reservation, $data)
    {
        return array_merge($reservation->toArray(), $data);
    }

}
