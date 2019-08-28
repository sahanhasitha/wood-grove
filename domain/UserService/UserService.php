<?php

/**
 * Author: Spera Labs/(+94)112 144 533
 * Email: hello@speralabs.com
 * File Name: UserService.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */
namespace domain\UserService;

use domain\Facades\ImagesFacade;
use App\User;
use Illuminate\Support\Facades\Hash;

/**
 * Admin side UserService
 * Class UserService
 * @Company domain\UserService
 */
class UserService
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function all()
    {
        return $this->user->all();
    }
    public function allNormal()
    {
        return $this->user->where('is_admin', '!=', 2)->get();
    }
    public function get($id)
    {
        return $this->user->find($id);
    }
    public function getImageDetails($id)
    {
        return $this->user->where('company_id', $id)->get();
    }
    public function find($id)
    {
             return $this->user->find($id);
    }
    public function updateUser($request)
    {
        $user = $this->get($request['user_id']);
        $this->update($user, $request);
    }
    public function destroy($id)
    {
        $user = $this->get($id);
        $user->delete();
        return $this->user->all();
    }
    public function updateCategoryImage($request, $id)
    {
        $user = $this->get($id);
        $name = str_replace(' ', '-', $request['image_name']);
        $data = $request->all();
        $image = ImagesFacade::up($request['image'], [2, 12, 9, 10, 13, 14], $name);
        $this->company_image->create([
            'image_id' => $image->id,
            'category_id' => $user->id,
        ]);
    }
    public function make($data)
    {
        return $this->create($data);
    }
    public function checkEmail($data)
    {
        return $this->user->where('email',$data)->first();
    }
    public function create($data)
    {
        return $this->user->create([
            "name" => $data['name'],
            "email" => $data['email'],
            "is_admin" => $data['is_admin'],
            "company_id" => $data['company_id'],
            "password" => Hash::make($data['password'])
        ]);
    }
    public function update(User $user, array $data)
    {
        $user->update($this->edit($user, $data));
    }
    protected function edit(User $user, $data)
    {
        return array_merge($user->toArray(), $data);
    }

}
