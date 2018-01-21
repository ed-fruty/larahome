<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sensor
 * @package App
 * @property string $id
 * @property string $name
 * @property int $status
 * @property string $keyword
 * @property string $pin
 * @property bool $has_history
 * @property int $history_step
 * @property string $room_id
 * @property string $node_id
 * @property Room $room
 * @property Node $node
 * @property mixed|string|int|float $value
 */
class Sensor extends Model
{
    public const ATTR_ID = 'id';
    public const ATTR_NAME = 'name';
    public const ATTR_STATUS = 'status';
    public const ATTR_KEYWORD = 'keyword';
    public const ATTR_PIN = 'pin';
    public const ATTR_HAS_HISTORY = 'has_history';
    public const ATTR_HISTORY_STEP = 'history_step';
    public const ATTR_ROOM_ID = 'room_id';
    public const ATTR_NODE_ID = 'node_id';
    public const ATTR_VALUE = 'value';
    public const ATTR_CREATED_AT = 'created_at';
    public const ATTR_UPDATED_AT = 'updated_at';

    public const ATTRIBUTES = [
        self::ATTR_ID, self::ATTR_NAME, self::ATTR_STATUS, self::ATTR_KEYWORD, self::ATTR_PIN,
        self::ATTR_HAS_HISTORY, self::ATTR_HISTORY_STEP, self::ATTR_ROOM_ID, self::ATTR_NODE_ID,
        self::ATTR_VALUE, self::ATTR_CREATED_AT, self::ATTR_UPDATED_AT
    ];

    /**
     * Cast attributes.
     *
     * @var array
     */
    protected $casts = [
        self::ATTR_STATUS => 'int',
        self::ATTR_HAS_HISTORY => 'bool',
        self::ATTR_HISTORY_STEP => 'int',
    ];

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'sensors';

    /**
     * Disable autoincrement.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Sensor node relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function node()
    {
        return $this->belongsTo(Node::class);
    }

    /**
     * Sensor room relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
