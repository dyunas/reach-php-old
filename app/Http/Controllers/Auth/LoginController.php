<?php

namespace App\Http\Controllers\Auth;

// use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

  public function username()
  {
    return 'username';
  }

  public function login(Request $request)
  {
    $http = new \GuzzleHttp\Client;
    try {
      $response = $http->post(config('services.passport.login_endpoint'), [
        'form_params' => [
          'grant_type' => 'password',
          'client_id' => config('services.passport.client_id'),
          'client_secret' => config('services.passport.client_secret'),
          'username' => $request->data['username'],
          'password' => $request->data['password'],
        ],
      ]);
      // return json_decode((string) $response->getBody(), true);
      return $response->getBody();
    } catch (\GuzzleHttp\Exception\BadResponseException $e) {
      if ($e->getCode() === 400) {
        return response()->json('Invalid request. please enter a username or a password.', $e->getCode());
      } else if ($e->getCode() === 401) {
        return response()->json('Invalid account! Please try again.', $e->getCode());
      }
      return response()->json('Something went wrong on the server.', $e->getCode());
    }
  }

  public function logout()
  {
    auth()->user()->tokens->each(function ($token) {
      $token->delete();
    });

    return response()->json('Logged out successfully', 200);
  }
}
