<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    public function user(Request $request)
    {
        return $request->user();
    }

    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json(
            [
                'message' => 'logout',
            ],
            200
        );
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->taikhoan)
            ->first();

        if (!$user || !Hash::check($request->matkhau, $user->password, [])) {
            return response()->json(
                [
                    'message' => 'Tài khoản đăng nhập không đúng!',
                    'tk' => $request->taikhoan,
                    'mk' => $request->matkhau,
                    'user' => $user
                ],
                401
            );
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(
            [
                'message' => 'success',
                'access_token' => $token,
                'type_token' => 'Bearer',
            ],
            200
        );
    }

    public function register(Request $request)
    {
        // $message = [
        //     'taikhoan.required' => 'Loi tai khoan',
        //     'matkhau.required' => 'Loi mat khau',
        // ];

        // $validate = Validator::make($request->all(), [
        //     'taikhoan' => 'required',
        //     'matkhau' => 'required',
        // ], $message);

        // if ($validate->fails()) {
        //     return response()->json(
        //         [
        //             'message' => $validate->errors()
        //         ],
        //         404
        //     );
        // }

        if (empty($request->taikhoan) || empty($request->matkhau) || empty($request->checkmatkhau)) {
            return response()->json(
                [
                    'message' => 'Trường không được để trống!'
                ],
                401
            );
        } else if ($request->matkhau != $request->checkmatkhau) {
            return response()->json(
                [
                    'message' => 'Nhập lại mật khẩu không đúng!'
                ],
                401
            );
        }


        $user = new User;
        $user->username = $request->taikhoan;
        $user->password = Hash::make($request->matkhau);
        $user->save();

        return response()->json(
            [
                'message' => 'OK may'
            ],
            200
        );
    }
}
