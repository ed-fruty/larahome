<?php
declare(strict_types=1);
namespace App\Components\Database\Schema;

class NodeScheme
{
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

    public const RELATION_SENSORS = 'sensors';

    public const ATTRIBUTES = [
        self::ATTR_ID, self::ATTR_NAME, self::ATTR_KEYWORD, self::ATTR_STATUS,
        self::ATTR_PLATFORM, self::ATTR_CONNECTION, self::ATTR_PROTOCOL, self::ATTR_DSN,
        self::ATTR_PINGED_AT, self::ATTR_CREATED_AT, self::ATTR_UPDATED_AT
    ];

    public const RELATIONS = [
        self::RELATION_SENSORS
    ];
}