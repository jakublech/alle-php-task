<?php
/**
 * @author Jakub Lech <info@smartbyte.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Core\User\Domain\Event;


use App\Core\User\Domain\Event\UserEvent;

final class UserCreatedEvent implements UserEvent
{
    public function __construct(
        public readonly ?int $userId,
        public readonly string $email,
        public readonly bool $isActive,
    ) {
    }
}
