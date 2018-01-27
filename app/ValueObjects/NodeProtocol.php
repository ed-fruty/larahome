<?php

namespace App\ValueObjects;

use App\Node;

final class NodeProtocol
{

    public const PROTOCOL_FIRMATA = 'firmata';
    public const PROTOCOL_JSON = 'json';
    public const PROTOCOL_AREST = 'aRest';
    public const PROTOCOL_MQTT = 'mqtt';

    public const PROTOCOLS = [
        self::PROTOCOL_FIRMATA, self::PROTOCOL_JSON, self::PROTOCOL_AREST, self::PROTOCOL_MQTT
    ];

    /**
     * @var string
     */
    private $protocol;

    /**
     * NodeProtocol constructor.
     * @param string $protocol
     */
    public function __construct(string $protocol)
    {
        if (! in_array($protocol, Node::PROTOCOLS)) {
            throw new \InvalidArgumentException(sprintf('Invalid protocol %s', $protocol));
        }

        $this->protocol = $protocol;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->protocol;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}