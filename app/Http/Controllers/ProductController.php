<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use domain\Facades\CompanyFacade;
use domain\Facades\ProductFacade;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show all products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products()
    {
        $response['products'] = ProductFacade::all();
        return view('products')->with($response);
    }
    /**
     * Show new products create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewProduct($id = null)
    {
        $response['product']=[];
        if($id!=[]){
        $response['product'] = ProductFacade::get($id);
        }
        $response['companies'] = CompanyFacade::allCompany();
        return view('add-new-product')->with($response);
    }
    /**
     * Show new products images create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewProductImage($id = null)
    {
       if($id!=[]){
           $response['product']=ProductFacade::get($id);
       }
        return view('add-new-product-images')->with($response);
    }
    /**
     * Save products details.
     * @param ProductRequest
     * @return response
     */
    public function storeProductDetails(ProductRequest $request)
    {
        $response['product'] = ProductFacade::make($request->all());
        return redirect()->route('add-new-product-image', $response['product']->id)->with('success', 'Product is successfully added');
    }

    /**
     * Delete products details.
     * @param id
     * @return response
     */
    public function deleteProduct($id)
    {
        $response['products'] = ProductFacade::destroy($id);
        return redirect()->back()->with($response)->with('deleted', 'Product is successfully deleted');
    }
    /**
     * Get products details.
     * @param Request
     * @return response
     */
    public function getProduct(Request $request)
    {
        $response['products'] = ProductFacade::get($request->id);
        $response['companies'] = CompanyFacade::allCompany();
        foreach (ProductFacade::getImages($request->id) as $key => $p_img) {
            $response['product_images'][$key]=$p_img->Image;
        }
        return json_encode($response);
    }
    /**
     * update products details.
     * @param Request
     * @return response
     */
    public function updateProduct(Request $request)
    {
        ProductFacade::updateProduct($request->all());
        return redirect()->route('add-new-product-image', $request->product_id)->with('updated', 'Product is successfully updated');
    }
}
