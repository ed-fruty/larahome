<?php
namespace App\ValueObjects;

use App\Node;

final class NodePlatform
{
    public const PLATFORM_ARDUINO = 'arduino';
    public const PLATFORM_ESP8266 = 'esp8266';
    public const PLATFORM_ESP32 = 'esp32';
    public const PLATFORM_RASPBERRY_PI = 'raspberry_pi';
    public const PLATFORM_ORANGE_PI = 'orange_pi';

    public const PLATFORMS = [
        self::PLATFORM_ARDUINO, self::PLATFORM_ESP8266, self::PLATFORM_ESP32,
        self::PLATFORM_RASPBERRY_PI, self::PLATFORM_ORANGE_PI
    ];

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