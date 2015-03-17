<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Infrastructure\CQRS\Handler;

use Black\Component\User\Infrastructure\CQRS\Handler\RegisterUserHandler as BaseHandler;
use Black\Component\User\Infrastructure\CQRS\Command\RegisterUserCommand;

/**
 * Class RegisterUserHandler
 */
class RegisterUserHandler extends BaseHandler
{
    /**
     * @param RegisterUserCommand $command
     */
    public function handle(RegisterUserCommand $command)
    {
        $user = $this->service->create($command->getUserId(), $command->getName(), $command->getEmail());
        $user->addRole('ROLE_USER');

        if ($user) {
            $this->service->register($user, $command->getPassword());
        }

        $this->manager->flush();
    }
}
