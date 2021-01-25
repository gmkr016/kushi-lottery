<?php

namespace Modules\Auth\Http\Controllers\Api\Agent;

use App\DTO\UserData;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data): \Illuminate\Validation\Validator
    {
        // return $data;
        return Validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'pan' => 'required|numeric|min:10|',
                'cname' => 'required',
                'location' => 'required',
                'contact' => 'required|numeric|min:10',
                'photo' => 'required|string',
            ]
        );
    }

    /**
     * @throws ValidationException
     */
    public function register(Request $request): JsonResponse|Response
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return response()->fail(['data' => 'Error while register']);
    }

    protected function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $user = (new User())->forceFill(UserData::from($data)->toArray());

        $user->save();

        return $user;
    }

    protected function registered(Request $request, User $user): JsonResponse|Response
    {

        $data['user'] = UserData::from($user)->toArray();
        $data['token'] = $user
            ->createToken(
                $request->get('email'),
                ['games:index', 'games:store', 'games:show', 'tickets:store', 'tickets:show']
            )->plainTextToken;

        return response()->success(['data' => $data, 'code' => 201]);
    }
}
