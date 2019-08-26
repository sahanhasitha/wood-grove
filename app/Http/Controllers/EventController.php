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
        return redirect()->route('add-new-event-image', $response['event']->id);
    }
    /**
     * Delete events details.
     * @param id
     * @return response
     */
    public function deleteEvent($id)
    {
        $response['events'] = EventFacade::destroy($id);
        return redirect()->back()->with($response)->with('success', 'Event is successfully deleted');
    }
    /**
     * Get events details.
     * @param Request
     * @return response
     */
    public function getEvent(Request $request)
    {
        $response['events'] = EventFacade::get($request->id);
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
        return redirect()->route('add-new-event-image', $request->event_id);
    }
}
