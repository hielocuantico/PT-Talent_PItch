<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UsersResource;
use App\Models\Users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::orderBy('id','asc')->paginate(10);

        return UsersResource::collection( $users );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = Users::create( $data );
        $user->refresh();

        return UsersResource::make( $user );
    }

    /**
     * Display the specified resource.
     */
    public function show($userName)
    {
        $usersByName = Users::where('name', 'like', "%{$userName}%")->get();

        if($usersByName->isEmpty()) {
            return response()->json(['error' => 'No se encontraron usuarios con ese nombre.'], 404);
        }

        return UsersResource::collection( $usersByName );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, Users $users)
    {
        $data = $request->validated();
        $users->update($data);

        return UsersResource::make($users);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        $users->delete();
        return response()->json(['message' => _('Usuario eliminado.')], 200);
    }
}
