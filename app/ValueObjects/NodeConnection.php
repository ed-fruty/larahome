<?php

namespace App\ValueObjects;

use App\Node;

final class NodeConnection
{
    public const CONNECTION_COM = 'com';
    public const CONNECTION_WIFI = 'wifi';
    public const CONNECTION_BLUETOOTH = 'bluetooth';
    public const CONNECTION_PUB_SUB = 'pub_sub';

    public const CONNECTIONS = [
        self::CONNECTION_COM, self::CONNECTION_WIFI, self::CONNECTION_BLUETOOTH, self::CONNECTION_PUB_SUB
    ];

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