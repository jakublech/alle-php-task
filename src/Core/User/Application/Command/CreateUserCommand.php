<?php
/**
 * @author Jakub Lech <info@smartbyte.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Core\User\Application\Command;

use App\Common\Command\SyncCommand;

final class CreateUserCommand implements SyncCommand
{
    public function __construct(
        public readonly string $email,
        public readonly bool $active
    ) {
    }
}
