<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use domain\Facades\CompanyFacade;
use domain\Facades\ServiceFacade;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Show all services.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function services()
    {
        $response['services'] = ServiceFacade::all();
        return view('services')->with($response);
    }
    /**
     * Show new services create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewService($id = null)
    {
        $response['service'] = [];
        if ($id != []) {
            $response['service'] = ServiceFacade::get($id);
        }
        $response['companies'] = CompanyFacade::allCompany();
        return view('add-new-service')->with($response);
    }
    /**
     * Show new services images create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewServiceImage($id = null)
    {
        if ($id != []) {
            $response['service'] = ServiceFacade::get($id);
        }
        return view('add-new-service-images')->with($response);
    }
    /**
     * Save services details.
     * @param ServiceRequest
     * @return response
     */
    public function storeServiceDetails(ServiceRequest $request)
    {
        $response['service'] = ServiceFacade::make($request->all());
        return redirect()->route('add-new-service-image', $response['service']->id);
    }
    /**
     * Delete services details.
     * @param id
     * @return response
     */
    public function deleteServices($id)
    {
        $response['services'] = ProductFacade::destroy($id);
        return redirect()->back()->with($response)->with('success', 'Product is successfully deleted');
    }
    /**
     * Get services details.
     * @param Request
     * @return response
     */
    public function getServices(Request $request)
    {
        $response['services'] = ProductFacade::get($request->id);
        return json_encode($response);
    }
    /**
     * update services details.
     * @param Request
     * @return response
     */
    public function updateService(Request $request)
    {
        ServiceFacade::updateServices($request->all());
        return redirect()->route('add-new-service-image', $request->service_id);
    }
}
