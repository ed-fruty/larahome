<?php

namespace App\Components\Database\Traits;


use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

/**
 * Trait HasUuid
 * @package App\Components\Database\Traits
 * @method static creating(callable $callback)
 */
trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function (Model $model) {
        	
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = Uuid::generate(4);
            }
        });
    }
}