<?php

/**
 * Author: Spera Labs/(+94)112 144 533
 * Email: hello@speralabs.com
 * File Name: CompanyService.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */
namespace domain\CompanyService;

use domain\Facades\ImagesFacade;
use App\Company;
use App\CompanyHasTag;
use App\Type;

/**
 * Admin side Company service
 * Class CompanyService
 * @Company domain\CompanyService
 */
class CompanyService
{
    protected $types;
    protected $companies;
    protected $tags;

    public function __construct()
    {
        $this->types = new Type();
        $this->companies = new Company();
        $this->tags = new CompanyHasTag();
    }
    public function allTypes()
    {
        return $this->types->all();
    }
    public function allTagsOnCompany($id)
    {
        return $this->tags->where('company_id', $id)->get();
    }

    public function getType($id)
    {
        return $this->types->find($id);
    }
    public function getTags($id)
    {
        return $this->tags->where('company_id', $id)->get();
    }
    public function getImageDetails($id)
    {
        return $this->company_image->where('company_id', $id)->get();
    }
    public function find($id)
    {
             return $this->types->find($id);
    }
    public function updateType($request)
    {
        $types = $this->getType($request['type_id']);
        $this->updateTypes($types, $request);
    }
    public function destroyType($id)
    {
        $types = $this->get($id);
        $types->delete();
        return $this->types->all();
    }
    public function updateCategoryImage($request, $id)
    {
        $company = $this->get($id);
        $name = str_replace(' ', '-', $request['image_name']);
        $data = $request->all();
        $image = ImagesFacade::up($request['image'], [2, 12, 9, 10, 13, 14], $name);
        $this->company_image->create([
            'image_id' => $image->id,
            'category_id' => $company->id,
        ]);
    }
    public function makeType($data)
    {
        return $this->createType($data);
    }
    public function createType($data)
    {
        return $this->types->create($data);
    }
    public function updateTypes(Type $types, array $data)
    {
        $types->update($this->editTypes($types, $data));
    }
    protected function editTypes(Type $types, $data)
    {
        return array_merge($types->toArray(), $data);
    }

    public function allCompany()
    {
        return $this->companies->all();
    }

    public function getCompany($id)
    {
        return $this->companies->find($id);
    }
    public function findCompany($id)
    {
        return $this->companies->find($id);
    }
    public function updateCompany($request)
    {
        $companies = $this->getCompany($request['company_id']);
        $this->updateCompanies($companies, $request);
        $tags = explode(",", $request['tags']);
        $this->destroyTags($request['company_id']);
        foreach ($tags as $key => $tag) {
            $this->tags->create([
                'company_id' => $request['company_id'],
                'tags' => $tag,
            ]);
        }
    }
    public function destroyCompany($id)
    {
        $companies = $this->getCompany($id);
        $companies->delete();
        return $this->companies->all();
    }
    public function destroyTags($id)
    {
        $tags = $this->getTags($id);
        foreach ($tags as $key => $value) {
            $value->delete();
        }
    }
    public function makeCompany($data)
    {
        return $this->createCompany($data);
    }
    public function createCompany($data)
    {
        $response['companies']=$this->companies->create($data);
        $tags = explode(",", $data['tags']);
        foreach ($tags as $key => $tag) {
            $this->tags->create([
                'company_id' => $response['companies']->id,
                'tags' => $tag,
            ]);
        }
        return $response;
    }
    public function updateCompanies(Company $companies, array $data)
    {
        $companies->update($this->editCompany($companies, $data));
    }
    protected function editCompany(Company $companies, $data)
    {
        return array_merge($companies->toArray(), $data);
    }

}
