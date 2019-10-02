<?php

namespace AgroSys\Http\Controllers\Auth;

use AgroSys\User;
use AgroSys\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'usuario' => ['required', 'string', 'max:55'],
            'nombres' => ['required', 'string', 'max:55'],
            'apellidos' => ['required', 'string', 'max:55'],
            'tipo_identificacion' => ['required', 'integer', 'max:2'],
            'num_identificacion' => ['required', 'integer', 'min:6'],
            'id_cargo' => ['required', 'integer', 'max:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \AgroSys\User
     */
    protected function create(array $data)
    {
        return User::create([
            'usuario' => $data['usuario'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'tipo_identificacion' => $data['tipo_identificacion'],
            'num_identificacion' => $data['num_identificacion'],
            'id_cargo' => $data['id_cargo'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function update(Request $request, $id){

        $usuario = User::where('id','=',$id)->first();
        $usuario->email = $request->email;
        $usuario->save();
        return view('home')->with('success', 'Book is successfully updated');
    }
}
