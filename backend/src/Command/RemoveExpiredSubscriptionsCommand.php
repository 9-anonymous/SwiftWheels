<?php
namespace App\Command;

use App\Repository\SubscriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(
    name: 'app:remove-expired-subscriptions',
    description: 'Removes expired subscriptions from the database.',
)]
class RemoveExpiredSubscriptionsCommand extends Command
{
    private $subscriptionRepository;
    private $entityManager;

    public function __construct(SubscriptionRepository $subscriptionRepository, EntityManagerInterface $entityManager)
    {
        $this->subscriptionRepository = $subscriptionRepository;
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $subscriptions = $this->subscriptionRepository->findExpiredSubscriptions();

        foreach ($subscriptions as $subscription) {
            $this->entityManager->remove($subscription);
        }

        $this->entityManager->flush();

        $output->writeln('Expired subscriptions removed successfully.');

        return Command::SUCCESS;
    }
}
