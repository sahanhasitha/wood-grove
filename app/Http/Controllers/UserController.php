<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use domain\Facades\CompanyFacade;
use domain\Facades\UserFacade;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{
    /**
     * Show all users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users()
    {
        $response['users'] = UserFacade::all();
        return view('users')->with($response);
    }
    /**
     * Show new company type create page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addNewUser($id = null)
    {
        $response['user'] = [];
        if ($id != []) {
            $response['user'] = UserFacade::get($id);
        }
        $response['companies'] = CompanyFacade::allCompany();
        return view('add-new-user')->with($response);
    }
    /**
     * Save type details.
     * @param UserRequest
     * @return response
     */
    public function storeUserDetails(UserRequest $request)
    {
        $email_check = UserFacade::checkEmail($request->email);
        if($email_check==[])
        {
            $response['users'] = UserFacade::make($request->all());
            return redirect(route('users'))->with($response);
        }else{
            return redirect()->back()->with('error', $request->email);
        }
    }
    /**
     * Delete type details.
     * @param id
     * @return response
     */
    public function deleteUser($id)
    {
        $response['types'] = UserFacade::destroy($id);
        return redirect()->back()->with($response)->with('success', 'User is successfully deleted');
    }
    /**
     * Get type details.
     * @param Request
     * @return response
     */
    public function getUser(Request $request)
    {
        $response['users'] = UserFacade::get($request->id);
        $response['companies'] = CompanyFacade::allCompany();
        return json_encode($response);
    }
    /**
     * update type details.
     * @param UserUpdateRequest
     * @return response
     */
    public function updateUser(UserUpdateRequest $request)
    {
        UserFacade::updateUser($request->all());
        return redirect(route('users'))->with('edited', 'User is successfully Updated');
    }
}
