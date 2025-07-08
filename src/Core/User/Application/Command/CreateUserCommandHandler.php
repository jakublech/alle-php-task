<?php
/**
 * @author Jakub Lech <info@smartbyte.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Core\User\Application\Command;


use App\Core\User\Domain\Repository\UserRepositoryInterface;
use App\Core\User\Domain\User;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateUserCommandHandler
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $this->userRepository->save(
            new User($command->email, $command->active)
        );
    }
}
