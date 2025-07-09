<?php
/**
 * @author Jakub Lech <info@smartbyte.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Core\User\UserInterface\Cli;


use App\Common\Bus\QueryBusInterface;
use App\Core\User\Application\Query\GetInactiveUsersEmailsQuery;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:user:get-inactive-emails',
    description: 'Retrieves emails of inactive users',
)]
class GetInactiveUserEmails extends Command
{
    public function __construct(private readonly QueryBusInterface $queryBus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inactiveUsersEmails = $this->queryBus->dispatch(new GetInactiveUsersEmailsQuery());

        if (0 === count($inactiveUsersEmails)) {
            $output->writeln('No inactive users found.');
            return Command::SUCCESS;
        }

        foreach ($inactiveUsersEmails as $email) {
            $output->writeln($email);
        }

        return Command::SUCCESS;
    }
}
