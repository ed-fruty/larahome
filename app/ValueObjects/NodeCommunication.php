<?php

namespace App\ValueObjects;

use App\ValueObjects\NodeDsn as Dsn;

final class NodeCommunication
{
    /**
     * @var NodeConnection
     */
    private $connection;
    /**
     * @var NodePlatform
     */
    private $platform;
    /**
     * @var NodeProtocol
     */
    private $protocol;
    /**
     * @var NodeDsn
     */
    private $dsn;

    /**
     * NodeCommunication constructor.
     * @param NodeConnection $connection
     * @param NodePlatform $platform
     * @param NodeProtocol $protocol
     * @param NodeDsn $dsn
     */
    public function __construct(NodeConnection $connection, NodePlatform $platform, NodeProtocol $protocol, Dsn $dsn)
    {
        $this->connection = $connection;
        $this->platform = $platform;
        $this->protocol = $protocol;
        $this->dsn = $dsn;
    }

    /**
     * @return NodeConnection
     */
    public function getConnection(): NodeConnection
    {
        return $this->connection;
    }

    /**
     * @return NodePlatform
     */
    public function getPlatform(): NodePlatform
    {
        return $this->platform;
    }

    /**
     * @return NodeProtocol
     */
    public function getProtocol(): NodeProtocol
    {
        return $this->protocol;
    }

    /**
     * @return NodeDsn
     */
    public function getDsn(): NodeDsn
    {
        return $this->dsn;
    }
}