<?php

namespace App;

use App\Components\Database\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{

    use HasUuid;

    public const PLATFORM_ARDUINO = 'arduino';
    public const PLATFORM_ESP8266 = 'esp8266';
    public const PLATFORM_ESP32 = 'esp32';
    public const PLATFORM_RASPBERRY_PI = 'raspberry_pi';
    public const PLATFORM_ORANGE_PI = 'orange_pi';

    public const CONNECTION_COM = 'com';
    public const CONNECTION_WIFI = 'wifi';
    public const CONNECTION_BLUETOOTH = 'bluetooth';
    public const CONNECTION_PUB_SUB = 'pub_sub';

    public const PROTOCOL_FIRMATA = 'firmata';
    public const PROTOCOL_JSON = 'json';
    public const PROTOCOL_AREST = 'aRest';
    public const PROTOCOL_MQTT = 'mqtt';

    public const ATTR_ID = 'id';
    public const ATTR_NAME = 'name';
    public const ATTR_STATUS = 'status';
    public const ATTR_KEYWORD = 'keyword';
    public const ATTR_PLATFORM = 'platform';
    public const ATTR_CONNECTION = 'connection';
    public const ATTR_PROTOCOL = 'protocol';
    public const ATTR_DSN = 'dsn';
    public const ATTR_PINGED_AT = 'pinged_at';
    public const ATTR_CREATED_AT = 'created_at';
    public const ATTR_UPDATED_AT = 'updated_at';

    public const PLATFORMS = [
        self::PLATFORM_ARDUINO, self::PLATFORM_ESP8266, self::PLATFORM_ESP32,
        self::PLATFORM_RASPBERRY_PI, self::PLATFORM_ORANGE_PI
    ];

    public const CONNECTIONS = [
        self::CONNECTION_COM, self::CONNECTION_WIFI, self::CONNECTION_BLUETOOTH, self::CONNECTION_PUB_SUB
    ];

    public const PROTOCOLS = [
        self::PROTOCOL_FIRMATA, self::PROTOCOL_JSON, self::PROTOCOL_AREST, self::PROTOCOL_MQTT
    ];

    public const ATTRIBUTES = [
        self::ATTR_ID, self::ATTR_NAME, self::ATTR_KEYWORD, self::ATTR_STATUS,
        self::ATTR_PLATFORM, self::ATTR_CONNECTION, self::ATTR_PROTOCOL, self::ATTR_DSN,
        self::ATTR_PINGED_AT, self::ATTR_CREATED_AT, self::ATTR_UPDATED_AT
    ];

    /**
     * @var string
     */
    protected $table = 'nodes';

    /**
     * @var bool
     */
    public $incrementing = false;


}
