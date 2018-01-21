<?php

namespace App\Bus\Handler;

use App\Bus\Command\CreateNodeCommand;
use App\Node;
use Carbon\Carbon;

final class CreateNodeHandler
{
    /**
     * @var Node
     */
    private $model;

    /**
     * CreateNodeHandler constructor.
     * @param Node $model
     */
    public function __construct(Node $model)
    {
        $this->model = $model;
    }

    /**
     * @param CreateNodeCommand $command
     */
    public function handle(CreateNodeCommand $command)
    {
        $node = $this->model->newInstance();

        $node->setAttribute(Node::ATTR_ID, $command->getId());
        $node->setAttribute(Node::ATTR_NAME, $command->getName());
        $node->setAttribute(Node::ATTR_STATUS, $command->getStatus()->getStatusValue());
        $node->setAttribute(Node::ATTR_KEYWORD, $command->getKeyword());
        $node->setAttribute(Node::ATTR_CONNECTION, $command->getCommunication()->getConnection()->getValue());
        $node->setAttribute(Node::ATTR_PLATFORM, $command->getCommunication()->getPlatform()->getValue());
        $node->setAttribute(Node::ATTR_PROTOCOL, $command->getCommunication()->getProtocol()->getValue());
        $node->setAttribute(Node::ATTR_DSN, $command->getCommunication()->getDsn()->getValue());
        $node->setAttribute(Node::ATTR_PINGED_AT, Carbon::now()->format('Y-m-d H:i:s'));

        $node->save();
    }
}