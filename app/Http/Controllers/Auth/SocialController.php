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
        $this->user = new User();
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request, $provider)
    {
        if($request->error_message){
            return redirect()->back()->with(['danger'=>$request->error_message]);
        }

        $platform = explode('/', $request->getRequestUri())[2];

        $userSocial = Socialite::driver($provider)->user();

        $email = $userSocial->email;

        $user = $this->user->findByEmail($email);

        if($user){
            return $this->login($user);
        } else {
            return $this->proceedRegister($platform, $userSocial);
        }
    }

    public function proceedRegister($platform, $data){
        return view('auth.social-reg-agreement')->with(['user' => [
            'email' => $data->email,
            'name' => $data->name,
            'provider' => $platform,
            'provider_id' => $data->id
        ]]);
    }

    public function doRegister(Request $request){
        return $this->login($this->user->create($request->all()));
    }

    public function login(User $user){
        Auth::guard()->login($user);

        return redirect('/');
    }
}