<?php
/**
 * @author Jakub Lech <info@smartbyte.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Core\User\UserInterface\Cli;


use App\Common\Bus\CommandBusInterface;
use App\Core\User\Application\Command\CreateUserCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:user:create',
    description: 'Creates a new user with the given email (inactive by default)'
)]
class CreateUser extends Command
{
    public function __construct(private CommandBusInterface $commandBus)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Creates a new user with the given email (inactive by default)')
            ->addArgument('email', InputArgument::REQUIRED, 'User email');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = $input->getArgument('email');

        $createUserCommand = new CreateUserCommand($email, false);
        $this->commandBus->dispatch($createUserCommand);

        $output->writeln('User created: ' . $email . ' (inactive)');

        return Command::SUCCESS;
    }
}
