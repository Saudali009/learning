<?php

namespace App\Http\Controllers;

use App\Http\Requests\sendSmsRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public $successStatus = 200;

    public function login()
    {

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);

        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function createAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;


        return response()->json(['success' => $success], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'The key is invalid/missing'], 403);

        } else {

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $path = storage_path() . '/app/public/images/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);

                $imageStoredPath = $path . $filename;
                dd($imageStoredPath);

            } else {
                return response()->json(['error' => 'Invalid Image file'], 403);
            }
        }
    }

    public function sendSms(sendSmsRequest $request)
    {
        $user = User::firstOrCreate([
            'name' => $request->get('name'),
            'phone' => $request->get('phone')
        ]);
        if ($user->hash_id == null) {
            $user->hash_id = generateHshId();
        }
        $code = rand(1000, 9999);
        $user->code = $code;
        $user->login_tries = $user->login_tries + 1;
        $user->save();
        return response()->json(['data' => [
            'hash_id' => $user->hash_id,
            'code' => $user->code
        ]]);
    }

    public function verify(Request $request)
    {
        $code = $request->get('code');
        $hash_id = $request->get('hash_id');
        $user = User::where(['hash_id' => $hash_id, 'code' => $code])->first();
        if ($user) {
            $user->login_tries = '0';
            Auth::login($user, true);
            $user = Auth::user();
            $user->save();
            $user->token = 'Bearer ' . $user->createToken('token')->accessToken;
            return response()->json(['data' => $user]);
        } else {
            return response()->json(['error' => 'Wrong OTP entered']);
        }
    }
}
