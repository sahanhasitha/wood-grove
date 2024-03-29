<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use domain\Facades\CompanyFacade;
use domain\Facades\EventFacade;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Show all events.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function events()
    {
        $response['events'] = EventFacade::all();
        return view('events')->with($response);
    }
    /**
     * Show new events create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewEvent($id = null)
    {
        $response['event'] = [];
        if ($id != []) {
            $response['event'] = EventFacade::get($id);
        }
        $response['companies'] = CompanyFacade::allCompany();
        return view('add-new-event')->with($response);
    }
    /**
     * Show new events images create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewEventImage($id = null)
    {
        if ($id != []) {
            $response['event'] = EventFacade::get($id);
        }
        return view('add-new-event-images')->with($response);
    }
    /**
     * Save events details.
     * @param EventRequest
     * @return response
     */
    public function storeEventDetails(EventRequest $request)
    {
        $response['event'] = EventFacade::make($request->all());
        return redirect()->route('add-new-event-image', $response['event']->id)->with('success', 'Event is successfully added');
    }
    /**
     * Delete events details.
     * @param id
     * @return response
     */
    public function deleteEvent($id)
    {
        $response['events'] = EventFacade::destroy($id);
        return redirect()->back()->with($response)->with('deleted', 'Event is successfully deleted');
    }
    /**
     * Get events details.
     * @param Request
     * @return response
     */
    public function getEvent(Request $request)
    {
        $response['events'] = EventFacade::get($request->id);
        $response['companies'] = CompanyFacade::allCompany();
        foreach (EventFacade::getImages($request->id) as $key => $e_img) {
            $response['event_images'][$key] = $e_img->Image;
        }
        return json_encode($response);
    }
    /**
     * update events details.
     * @param Request
     * @return response
     */
    public function updateEvent(EventRequest $request)
    {
        EventFacade::updateEvent($request->all());
        return redirect()->route('add-new-event-image', $request->event_id)->with('updated', 'Event is successfully updated');
    }
}
