<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      //   terminar validacion

  //    dd($data);
        return Validator::make($data, [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'nacimiento' => 'date_format:"Y-m-d"|required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if(!isset($data['avisos'])){
          $data['avisos'] = 0;
        }
        if(!isset($data['actualizaciones'])){
          $data['actualizaciones'] = 0;
        }
        if(!isset($data['ofertas'])){
          $data['ofertas'] = 0;
        }
      //  dd($data);
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nacimiento' => $data['nacimiento'],
            'suscAvisos' => $data['avisos'],
            'suscOfertas' => $data['ofertas'],
            'suscActualizaciones' => $data['actualizaciones'],
        ]);
    }
}
