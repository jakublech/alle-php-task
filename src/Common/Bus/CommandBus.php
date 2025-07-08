<?php
/**
 * @author Jakub Lech <info@smartbyte.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Common\Bus;

use App\Common\Command\AsyncCommand;
use App\Common\Command\SyncCommand;
use Symfony\Component\Messenger\MessageBusInterface;

final class CommandBus implements CommandBusInterface
{
    public function __construct(private MessageBusInterface $messageBus)
    {
    }

    public function dispatch(SyncCommand|AsyncCommand $command): void
    {
        $this->messageBus->dispatch($command);
    }
}
