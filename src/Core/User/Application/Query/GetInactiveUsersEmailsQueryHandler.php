<?php
/**
 * @author Jakub Lech <info@smartbyte.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Core\User\Application\Query;


use App\Core\User\Domain\Repository\UserRepositoryInterface;
use App\Core\User\Domain\User;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class GetInactiveUsersEmailsQueryHandler
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    public function __invoke(GetInactiveUsersEmailsQuery $query): array
    {
        $inactiveUsers = $this->userRepository->findInactiveUsers();

        return array_map(function (User $user) {
            return $user->getEmail();
        }, $inactiveUsers);
    }
}
