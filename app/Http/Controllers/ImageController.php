<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\ImagesFacade;
use domain\Facades\CategoriesFacades;
use domain\Facades\EventFacade;
use domain\Facades\ImagesDeleteFacade;
use domain\Facades\ProductFacade;
use domain\Facades\ReservationFacade;
use domain\Facades\ServiceFacade;

class ImageController extends Controller
{
    /**
     * upload product image.
     *
     * @param Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function uploadProductImage(Request $request)
    {
        $response['product_id']=ProductFacade::uploadProductImage($request);
        return redirect()->route('add-new-product-image', $response['product_id']);
    }
    /**
     * delete product image.
     *
     * @param Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteProductImage(Request $request, $id)
    {
        $data = ImagesDeleteFacade::deleteProductImage($id);
        return redirect(route('add-new-product-image', $data->product_id));
    }
    /**
     * upload service image.
     *
     * @param Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function uploadServiceImage(Request $request)
    {
        $response['service_id'] = ServiceFacade::uploadServiceImage($request);
        return redirect()->route('add-new-service-image', $response['service_id']);
    }
    /**
     * delete service image.
     *
     * @param Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteServiceImage(Request $request, $id)
    {
        $data = ImagesDeleteFacade::deleteServiceImage($id);
        return redirect(route('add-new-service-image', $data->service_id));
    }
    /**
     * upload product image.
     *
     * @param Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function uploadReservationImage(Request $request)
    {
        $response['reservation_id'] = ReservationFacade::uploadReservationImage($request);
        return redirect()->route('add-new-reservation-image', $response['reservation_id']);
    }
    /**
     * delete reservation image.
     *
     * @param Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteReservationImage(Request $request, $id)
    {
        $data = ImagesDeleteFacade::deleteReservationImage($id);
        return redirect(route('add-new-reservation-image', $data->reservation_id));
    }
    /**
     * upload event image.
     *
     * @param Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function uploadEventImage(Request $request)
    {
        $response['event_id'] = EventFacade::uploadEventImage($request);
        return redirect()->route('add-new-event-image', $response['event_id']);
    }
    /**
     * delete event image.
     *
     * @param Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteEventImage(Request $request, $id)
    {
        $data = ImagesDeleteFacade::deleteEventImage($id);
        return redirect(route('add-new-event-image', $data->event_id));
    }
    /**
     * check image name.
     *
     * @param Request
     * @return string
     */
    public function checkImageName(Request $request)
    {
        return json_encode(ImagesFacade::getImagenamefromImageTable($request->image_name));

    }
}
