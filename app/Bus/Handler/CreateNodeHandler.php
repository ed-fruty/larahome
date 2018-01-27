<?php

namespace App\Bus\Handler;

use App\Bus\Command\CreateNodeCommand;
use App\Events\NodeWasCreated;
use App\Node;
use App\Repositories\NodeRepository;
use Carbon\Carbon;

final class CreateNodeHandler
{
    /**
     * @var NodeRepository
     */
    private $nodeRepository;

    /**
     * CreateNodeHandler constructor.
     * @param Node $model
     */
    public function __construct(NodeRepository $nodeRepository)
    {
        $this->nodeRepository = $nodeRepository;
    }

    /**
     * @param CreateNodeCommand $command
     */
    public function handle(CreateNodeCommand $command)
    {
        $node = $this->nodeRepository->newInstance();

        $node->setId($command->getId())
            ->setKeyword($command->getKeyword())
            ->setName($command->getName())
            ->setStatus($command->getStatus())
            ->setConnection($command->getCommunication()->getConnection())
            ->setPlatform($command->getCommunication()->getPlatform())
            ->setProtocol($command->getCommunication()->getProtocol())
            ->setDsn($command->getCommunication()->getDsn())
            ->setPingedAt(Carbon::now());

        $this->nodeRepository->save($node);

        event(new NodeWasCreated($node));
    }
}