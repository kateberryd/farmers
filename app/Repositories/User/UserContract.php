<?php

namespace App\Repositories\User;

interface UserContract
{
    public function create($request, $password);
    public function findAll();
    public function findById($userId);
    public function remove($userId);
    public function authenticate($request);
}
