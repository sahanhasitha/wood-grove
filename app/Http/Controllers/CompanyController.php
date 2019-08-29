<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\TypesRequest;
use domain\Facades\CompanyFacade;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Show all company types.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function types()
    {
        $response['types']=CompanyFacade::allTypes();
        return view('types')->with($response);
    }
    /**
     * Show new company type create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewType($id = null)
    {
        $response['type'] = [];
        if ($id != []) {
            $response['type'] = CompanyFacade::getType($id);
        }
        return view('add-new-type')->with($response);
    }
    /**
     * Save type details.
     * @param TypesRequest
     * @return response
     */
    public function storeTypeDetails(TypesRequest $request)
    {
        $response['types']=CompanyFacade::makeType($request->all());
        return redirect(route('types'))->with($response);
    }
    /**
     * Delete type details.
     * @param id
     * @return response
     */
    public function deleteType($id)
    {
        $response['types'] = CompanyFacade::destroyType($id);
        return redirect()->back()->with($response)->with('success', 'Type is successfully deleted');
    }
    /**
     * Get type details.
     * @param Request
     * @return response
     */
    public function getType(Request $request)
    {
        $response['types'] = CompanyFacade::getType($request->id);
        return json_encode($response);
    }

    /**
     * update type details.
     * @param Request
     * @return response
     */
    public function updateType(TypesRequest $request)
    {
        CompanyFacade::updateType($request->all());
        return redirect(route('types'))->with('success', 'Type is successfully Updated');
    }
    /**
     * Show all companies.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function companies()
    {
        $response['companies'] = CompanyFacade::allCompany();
        return view('companies')->with($response);
    }
    /**
     * Show new company type create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewCompany($id = null)
    {
        $response['company'] = [];
        $response['tags'] = [];
        if ($id != []) {
            $response['company'] = CompanyFacade::getCompany($id);
            $response['tags'] = CompanyFacade::getTags($id);
        }
        $response['types'] = CompanyFacade::allTypes();
        $response['companies'] = CompanyFacade::allCompany();
        return view('add-new-company')->with($response);
    }
    /**
     * Save company details.
     * @param CompanyRequest
     * @return response
     */
    public function storeCompanyDetails(CompanyRequest $request)
    {
        $response['companies'] = CompanyFacade::makeCompany($request->all());
        return redirect(route('companies'))->with($response);
    }
    /**
     * Delete company details.
     * @param id
     * @return response
     */
    public function deleteCompany($id)
    {
        $response['companies'] = CompanyFacade::destroyCompany($id);
        return redirect()->back()->with($response)->with('success', 'Company is successfully deleted');
    }
    /**
     * Get company details.
     * @param Request
     * @return response
     */
    public function getCompany(Request $request)
    {
        $response['allTypes'] = CompanyFacade::allTypes();
        $response['companies'] = CompanyFacade::getCompany($request->id);
        $response['tags'] = CompanyFacade::allTagsOnCompany($request->id);
        return json_encode($response);
    }
    /**
     * update company details.
     * @param Request
     * @return response
     */
    public function updateCompany(CompanyRequest $request)
    {
        CompanyFacade::updateCompany($request->all());
        return redirect(route('companies'))->with('success', 'Company is successfully Updated');
    }


}
