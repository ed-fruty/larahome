<?php

namespace App\ValueObjects;

use App\Node;

final class NodeConnection
{
    /**
     * @var string
     */
    private $connection;

    /**
     * NodeConnection constructor.
     * @param string $connection
     */
    public function __construct(string $connection)
    {
        if (! in_array($connection, Node::CONNECTIONS)) {
            throw new \InvalidArgumentException(sprintf('Invalid connection %s', $connection));
        }

        $this->connection = $connection;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->connection;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}