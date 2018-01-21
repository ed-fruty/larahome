<?php

namespace App\ValueObjects;

use App\Node;

final class NodeProtocol
{
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