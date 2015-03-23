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

use Black\Component\User\Domain\Event\UserCreatedEvent;
use Black\Component\User\Infrastructure\CQRS\Handler\CreateUserHandler as BaseHandler;
use Black\Component\User\Infrastructure\CQRS\Command\CreateUserCommand;
use Black\Component\User\UserDomainEvents;

/**
 * Class CreateUserHandler
 */
class CreateUserHandler extends BaseHandler
{
    /**
     * @param CreateUserCommand $command
     */
    public function handle(CreateUserCommand $command)
    {
        $user = $this->service->create($command->getUserId(), $command->getName(), $command->getEmail());
        $user->addRole('ROLE_USER');

        if ($user) {
            $this->manager->flush();

            $event = new UserCreatedEvent($user);
            $this->dispatcher->dispatch(UserDomainEvents::USER_DOMAIN_CREATED, $event);
        }
    }
}
