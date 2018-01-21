<?php

namespace App;

use App\Components\Database\Traits\HasUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 * @package App
 * @property string $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Sensor[]|Collection $sensors
 */
class Room extends Model
{
    use HasUuid;

    public const ATTR_ID = 'id';
    public const ATTR_NAME = 'name';
    public const ATTR_CREATED_AT = 'created_at';
    public const ATTR_UPDATED_AT = 'updated_at';

    public const ATTRIBUTES = [
        self::ATTR_ID, self::ATTR_NAME, self::ATTR_CREATED_AT, self::UPDATED_AT
    ];

    /**
     * Disable autoincrement.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $table = 'rooms';

    /**
     * Room sensors relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sensors()
    {
        return $this->hasMany(Sensor::class);
    }
}
