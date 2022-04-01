<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\UsuarioModel;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {

        $user = UsuarioModel::where('username', $request->username)
            ->where('senha', md5($request->password))
            ->first();
        if (is_object($user)) {
            if ($user->tipoUtilizador == 1 || $user->tipoUtilizador == 2 || $user->tipoUtilizador == 3) {
                return view('layouts.inicio');
            } else if ($user->tipoUtilizador == 4) {
                return view('layouts.homeClinica');
            } else if ($user->tipoUtilizador == 5) {
                return view('layouts.homePrestador');
            } else {
                return back()->with('error', 'Erro ao tentar fazer login.');
            }
        } else {
            
            return back()->with('error', 'Erro ao tentar fazer login.');
        }
    }
}
