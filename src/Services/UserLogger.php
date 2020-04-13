<?php

namespace App\Services;

use App\Entity\User;
use App\Repository\UserRepository;

class UserLogger extends UserManager
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserByEmail(): User
    {
        $user = $this->userRepository->find(1);
        $this->userLoggerWithRand($user);

        return  $user;
    }
}
