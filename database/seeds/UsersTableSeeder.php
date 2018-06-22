<?php

use Illuminate\Database\Seeder;

use App\Repositories\User\EloquentUserRepository;

class UsersTableSeeder extends Seeder
{
    protected $userModel;
    public function __construct(EloquentUserRepository $userContract) {
        $this->userModel = $userContract;
    }

    public function run()
    {
        $user1 = new \stdClass();
        $user1->username = 'pladmin';
        $this->userModel->create($user1, 'pladmin');

      
    }
}
