<?php

/**
 * Author: Spera Labs/(+94)112 144 533
 * Email: hello@speralabs.com
 * File Name: CompanyService.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */
namespace domain\ProductService;

use domain\Facades\ImagesFacade;
use App\Company;
use App\Product;
use App\ProductImage;
use App\Type;

/**
 * Admin side ProductService
 * Class ProductService
 * @Company domain\ProductService
 */
class ProductService
{
    protected $product;
    protected $product_image;

    public function __construct()
    {
        $this->product = new Product();
        $this->product_image = new ProductImage();
    }
    public function all()
    {
        return $this->product->all();
    }

    public function get($id)
    {
        return $this->product->find($id);
    }
    public function getImageDetails($id)
    {
        return $this->company_image->where('company_id', $id)->get();
    }
    public function find($id)
    {
             return $this->product->find($id);
    }
    public function updateProduct($request)
    {
        $product = $this->get($request['product_id']);
        $this->update($product, $request);
    }
    public function destroy($id)
    {
        $product = $this->get($id);
        $product->delete();
        return $this->product->all();
    }
    public function uploadProductImage($request)
    {
        $product = $this->get($request->product_id);
        $name = str_replace(' ', '-', $request['image_name']);
        $data = $request->all();
        $image = ImagesFacade::up($request['image'], [2, 12, 9, 10, 13, 14], $name);
        $this->product_image->create([
            'image_id' => $image->id,
            'product_id' => $product->id,
        ]);
        return $product->id;
    }
    public function make($data)
    {
        return $this->create($data);
    }
    public function create($data)
    {
        return $this->product->create($data);
    }
    public function update(Product $product, array $data)
    {
        $product->update($this->edit($product, $data));
    }
    protected function edit(Product $product, $data)
    {
        return array_merge($product->toArray(), $data);
    }

}
