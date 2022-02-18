<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    public function getAllUsers()
    {
        return response()->json(
            [
                'users' => User::query()->orderBy('created_at', 'DESC')->get()
            ],
            Response::HTTP_OK
        );
    }

    public function getPendingUsers()
    {
        if ( !Auth::user()->is_admin) {
            return response()->json(['message' => 'You don\'t have the authorization to do this action.'], 401);
        }

        $users = User::query()->whereNull('approved_at')->get();

        return response()->json(['users' => $users], Response::HTTP_OK);
    }

    public function approveUser($id)
    {
        if ( !Auth::user()->is_admin) {
            return response()->json(['message' => 'You don\'t have the authorization to do this action.']);
        }

        try {
            $user = User::query()->findOrFail($id);

            $user->update(['approved_at' => Carbon::now()]);

            return response()->json(['message' => 'The user was approved'], 200);

        } catch(Exception $exception) {
            return $exception;
        }
    }
}
