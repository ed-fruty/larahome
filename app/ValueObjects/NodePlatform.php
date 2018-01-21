<?php
namespace App\ValueObjects;

use App\Node;

final class NodePlatform
{
    /**
     * @var string
     */
    private $platform;

    /**
     * NodePlatform constructor.
     * @param string $platform
     */
    public function __construct(string $platform)
    {
        if (! in_array($platform, Node::PLATFORMS)) {
            throw new \InvalidArgumentException(sprintf('Invalid platform %s', $platform));
        }
        $this->platform = $platform;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->platform;
    }
}