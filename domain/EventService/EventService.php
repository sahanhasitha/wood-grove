<?php

/**
 * Author: Spera Labs/(+94)112 144 533
 * Email: hello@speralabs.com
 * File Name: ServiceService.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */
namespace domain\EventService;

use domain\Facades\ImagesFacade;
use App\Company;
use App\Event;
use App\EventImage;

/**
 * Admin side ServiceService
 * Class ServiceService
 * @Company domain\ServiceService
 */
class EventService
{
    protected $event;
    protected $event_image;

    public function __construct()
    {
        $this->event = new Event();
        $this->event_image = new EventImage();
    }
    public function all()
    {
        return $this->event->all();
    }

    public function get($id)
    {
        return $this->event->find($id);
    }
    public function getImages($id)
    {
        return $this->event_image->where('event_id', $id)->get();
    }
    public function find($id)
    {
        return $this->event->find($id);
    }
    public function updateEvent($request)
    {
        $event = $this->get($request['event_id']);
        $this->update($event, $request);
    }
    public function destroy($id)
    {
        $event = $this->get($id);
        $event->delete();
        return $this->event->all();
    }
    public function uploadEventImage($request)
    {
        $event = $this->get($request->event_id);
        $name = str_replace(' ', '-', $request['image_name']);
        $data = $request->all();
        $image = ImagesFacade::up($request['image'], [2, 12, 9, 10, 13, 14], $name);
        $this->event_image->create([
            'image_id' => $image->id,
            'event_id' => $event->id,
        ]);
        return $event->id;
    }
    public function make($data)
    {
        return $this->create($data);
    }
    public function create($data)
    {
        return $this->event->create($data);
    }
    public function update(Event $event, array $data)
    {
        $event->update($this->edit($event, $data));
    }
    protected function edit(Event $event, $data)
    {
        return array_merge($event->toArray(), $data);
    }

}
