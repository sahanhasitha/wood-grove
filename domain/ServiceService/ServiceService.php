<?php

/**
 * Author: Spera Labs/(+94)112 144 533
 * Email: hello@speralabs.com
 * File Name: ServiceService.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */
namespace domain\ServiceService;

use domain\Facades\ImagesFacade;
use App\Company;
use App\Service;
use App\ServiceImage;

/**
 * Admin side ServiceService
 * Class ServiceService
 * @Company domain\ServiceService
 */
class ServiceService
{
    protected $service;
    protected $service_image;

    public function __construct()
    {
        $this->service = new Service();
        $this->service_image = new ServiceImage();
    }
    public function all()
    {
        return $this->service->all();
    }

    public function get($id)
    {
        return $this->service->find($id);
    }
    public function getImageDetails($id)
    {
        return $this->service_image->where('service_id', $id)->get();
    }
    public function find($id)
    {
             return $this->service->find($id);
    }
    public function updateServices($request)
    {
        $service = $this->get($request['service_id']);
        $this->update($service, $request);
    }
    public function destroy($id)
    {
        $service = $this->get($id);
        $service->delete();
        return $this->service->all();
    }
    public function uploadServiceImage($request)
    {
        $service = $this->get($request->service_id);
        $name = str_replace(' ', '-', $request['image_name']);
        $data = $request->all();
        $image = ImagesFacade::up($request['image'], [2, 12, 9, 10, 13, 14], $name);
        $this->service_image->create([
            'image_id' => $image->id,
            'service_id' => $service->id,
        ]);
        return $service->id;
    }
    public function make($data)
    {
        return $this->create($data);
    }
    public function create($data)
    {
        return $this->service->create($data);
    }
    public function update(Service $service, array $data)
    {
        $service->update($this->edit($service, $data));
    }
    protected function edit(Service $service, $data)
    {
        return array_merge($service->toArray(), $data);
    }

}
