<?php

namespace App\Services;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;

abstract class UserManager
{
    protected $objectManager;


    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function addUser(): void
    {
        $user = new User();
        $user->setUsername('testuser' . rand());
        $user->setPassword('uuu' . rand());
        $user->setEmail('ahmed' . rand() . '@gmail.fr');
        $this->objectManager->persist($user);
        $this->objectManager->flush();
    }

    protected function userLoggerWithRand(User $user): void
    {
        $this->logger->info($user->getEmail() . rand());
    }
}
