<?php

namespace Modules\Auth\Http\Controllers\Api\Agent;

use App\DTO\UserData;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(Request $request): Response
    {
        $token = $request->user()
            ->createToken(
                $request->get('deviceId'),
                ['games:index', 'games:store', 'games:show', 'tickets:store', 'tickets:show']
            )->plainTextToken;
        $user = UserData::from($request->user());

        return response()->success(['data' => ['user' => $user, 'token' => $token]]);
    }

    protected function sendFailedLoginResponse(Request $request): Response
    {
        return response()->fail(['data' => 'Unauthenticated', 'code' => 401]);
    }

    public function logout(Request $request): Response
    {
        $request->user()->tokens()->delete();

        return response()->success(['data' => 'Logged Out']);
    }
}
