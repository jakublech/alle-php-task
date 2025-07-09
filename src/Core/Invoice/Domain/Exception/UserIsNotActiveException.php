<?php
/**
 * @author Jakub Lech <info@smartbyte.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Core\Invoice\Domain\Exception;


use App\Core\Invoice\Domain\Exception\InvoiceException;

class UserIsNotActiveException extends InvoiceException
{

}
