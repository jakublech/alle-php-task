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

interface CommandBusInterface
{
    public function dispatch(AsyncCommand|SyncCommand $command): void;
}
