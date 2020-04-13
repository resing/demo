<?php

namespace App\Tests\Command;

use App\Command\CreateUserCommand;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;

class CreateUserCommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $application->add(new CreateUserCommand());

        $command = $application->find('app:create-user');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => $command->getName(),

            // pass arguments to the helper
            'name' => 'Wouter',

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
        ));

        // the output of the command in the console
        $output = $commandTester->getDisplay();

        $this->assertContains('Wouter', $output);

        // ...
    }
}
