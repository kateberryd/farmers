<?php

namespace App\Repositories\User;

use Auth;
use App\User;
use App\Repositories\User\UserContract;

class EloquentUserRepository implements UserContract
{
    public function create($request, $password) {
        // return DB::table('users')->insert([
        //     'username' => $request->username,
        //     'password' => bcrypt($password),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => $now = Carbon::now(),
        //     'type' => $type
        // ]);
        $user = new User;
        $this->setUserProperties($user, $request, $password);
        $user->save();
        return $user;
    }

    public function findAll() {
        return User::all();
    }

    public function findById($userId) {
        return User::find($userId);
    }

    public function remove($userId) {
        return $user->destroy($userId);
    }

    public function authenticate($request) {
        $remember = ($request->remember == 'on') ? true : false;
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ], $remember)) {
            return [
                'status' => 'success',
                'user' => Auth::user()
            ];
        } else {
            return [
                'status' => 'failed',
                'error' => 'Incorrect login details'
            ];
        }
    }

    private function setUserProperties($user, $request, $password) {
        $user->username = $request->username;
        $user->password = bcrypt($password);
    }
}
