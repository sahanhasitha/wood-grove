<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    protected $user;

    public function __construct()
    {
        //Create User instance to use across class
        $this->user = new User();
    }

    /**
     * Redirect to specific provider per request
     * @param $provider
     * @return mixed
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle callback from provider
     * @param Request $request
     * @param $provider
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function callback(Request $request, $provider)
    {
        //Returns back if response contains an error
        if($request->error_message){
            return redirect()->back()->with(['danger'=>$request->error_message]);
        }

        //Get platform from response URI
        $platform = explode('/', $request->getRequestUri())[2];

        //Get user data using received auth token
        $userSocial = Socialite::driver($provider)->user();

        $email = $userSocial->email;

        //Get user by email
        $user = $this->user->findByEmail($email);

        //Register if user doesnt exists
        if($user){
            return $this->login($user);
        } else {
            return $this->proceedRegister($platform, $userSocial);
        }
    }

    /**
     * Redirect new user to agree to terms for registration
     * @param $platform
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function proceedRegister($platform, $data){
        return view('auth.social-reg-agreement')->with(['user' => [
            'email' => $data->email,
            'name' => $data->name,
            'provider' => $platform,
            'provider_id' => $data->id
        ]]);
    }

    /**
     * Register user in DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doRegister(Request $request){
        $data = $request->all();
        $data['password'] = str_random(10);

        return $this->login($this->user->create($data));
    }

    /**
     * Login with direct user object(without password)
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(User $user){
        Auth::guard()->login($user);

        return redirect('/');
    }
}