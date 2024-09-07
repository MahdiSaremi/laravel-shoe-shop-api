<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Rules\NewPhoneRule;
use App\Rules\PhoneRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $input = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'phone' => ['required', 'string', $phoneRule = new NewPhoneRule()],
            'referral_code' => 'nullable|string|exists:users,referral_code',
            'password' => ['required', 'string', Password::defaults()],
        ]);

        $input['last_name'] ??= '';
        $input['phone'] = $phoneRule->fixedNumber;
        $input['password'] = Hash::make($input['password']);

        // Referral
        if (isset($input['referral_code']) && $invited_by = User::where('referral_code', $input['referral_code'])->first())
        {
            $input['invited_by_id'] = $invited_by->id;
        }

        // Generate unique referral code
        $input['referral_code'] = retry(10, function()
        {
            $code = Str::random(6);
            if (User::where('referral_code', $code)->exists())
            {
                abort(500);
            }
            return $code;
        });

        // Create and login the user
        $user = User::create($input);

        Auth::login($user);

        return response()->json(true);
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        session()->regenerate();

        return response()->json(true);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(true);
    }

}
