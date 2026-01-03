<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\WebLoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function __construct(protected AuthService $auth_service) {}
  public function login(WebLoginRequest $webLoginRequest)
  {
    $this->auth_service->login($webLoginRequest->validated());
    return redirect()->route('dashboard');
  }

  public function showLogin()
  {
    return view('auth.login');
  }
  public function dashboard()
  {

    return view('auth.dashboard');
  }
  public function logout(Request $request)
  {
    $this->auth_service->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return view('auth.login');
  }
}
