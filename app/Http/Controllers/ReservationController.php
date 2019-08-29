<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use domain\Facades\CompanyFacade;
use domain\Facades\ReservationFacade;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Show all reservations.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reservations()
    {
        $response['reservations'] = ReservationFacade::all();
        return view('reservations')->with($response);
    }
    /**
     * Show new reservation create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewReservation($id = null)
    {
        $response['reservation'] = [];
        if ($id != []) {
            $response['reservation'] = ReservationFacade::get($id);
        }
        $response['companies'] = CompanyFacade::allCompany();
        return view('add-new-reservation')->with($response);
    }
    /**
     * Show new reservations images create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewReservationImage($id = null)
    {
        if ($id != []) {
            $response['reservation'] = ReservationFacade::get($id);
        }
        return view('add-new-reservation-images')->with($response);
    }
    /**
     * Save reservations details.
     * @param ReservationRequest
     * @return response
     */
    public function storeReservationDetails(ReservationRequest $request)
    {
        $response['reservation'] = ReservationFacade::make($request->all());
        return redirect()->route('add-new-reservation-image', $response['reservation']->id)->with('success', 'Reservation is successfully added');
    }
    /**
     * Delete reservations details.
     * @param id
     * @return response
     */
    public function deleteReservation($id)
    {
        $response['reservations'] = ReservationFacade::destroy($id);
        return redirect()->back()->with($response)->with('deleted', 'Reservation is successfully deleted');
    }
    /**
     * Get reservations details.
     * @param Request
     * @return response
     */
    public function getReservation(Request $request)
    {
        $response['reservations'] = ReservationFacade::get($request->id);
        $response['companies'] = CompanyFacade::allCompany();
        foreach (ReservationFacade::getImages($request->id) as $key => $r_img) {
            $response['reservation_images'][$key] = $r_img->Image;
        }
        return json_encode($response);
    }
    /**
     * update reservations details.
     * @param ReservationRequest
     * @return response
     */
    public function updateReservation(ReservationRequest $request)
    {
        ReservationFacade::updateReservation($request->all());
        return redirect()->route('add-new-reservation-image', $request->reservation_id)->with('updated', 'Reservation is successfully updated');
    }
}
