<?php

namespace App\Traits;

trait HasCustomId
{
    protected static function bootHasCustomId()
    {
        static::creating(function ($model) {
            $prefix = $model->getCustomIdPrefix();
            $lastRecord = static::latest('id')->first();

            $nextId = $lastRecord ? (int)substr($lastRecord->{$model->getCustomIdColumn()}, strlen($prefix)) + 1 : 1;
            $model->{$model->getCustomIdColumn()} = $prefix . str_pad($nextId, 8, '0', STR_PAD_LEFT);
        });
    }

    abstract public function getCustomIdPrefix(): string;

    public function getCustomIdColumn(): string
    {
        return 'custom_id';
    }
}
