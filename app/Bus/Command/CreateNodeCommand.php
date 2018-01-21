<?php

namespace App\Bus\Command;

use App\ValueObjects\NodeCommunication;
use App\ValueObjects\Status;

final class CreateNodeCommand
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $keyword;
    /**
     * @var NodeCommunication
     */
    private $communication;
    /**
     * @var Status
     */
    private $status;

    /**
     * CreateNodeCommand constructor.
     * @param string $id
     * @param string $name
     * @param string $keyword
     * @param NodeCommunication $communication
     * @param Status $status
     */
    public function __construct(
        string $id,
        string $name,
        string $keyword,
        NodeCommunication $communication,
        Status $status
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->keyword = $keyword;
        $this->communication = $communication;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * @return NodeCommunication
     */
    public function getCommunication(): NodeCommunication
    {
        return $this->communication;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }
}