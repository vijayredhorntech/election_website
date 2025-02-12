<?php

namespace App\Traits;

trait HasCustomId
{
    protected static function bootHasCustomId()
    {
        static::creating(function ($model) {
            $prefix = $model->getCustomIdPrefix();
            $lastRecord = static::where($model->getCustomIdColumn(), 'LIKE', "{$prefix}%")
                ->latest($model->getCustomIdColumn())
                ->first();

            if ($lastRecord) {
                // Extract numeric part after the prefix
                $numericPart = (int)substr($lastRecord->{$model->getCustomIdColumn()}, strlen($prefix));
                $nextId = $numericPart + 1; // Generate a growing random ID
            } else {
                $nextId = 1; // Start from 1 if no previous record exists
            }

            $model->{$model->getCustomIdColumn()} = $prefix . $nextId;
        });
    }

    abstract public function getCustomIdPrefix(): string;

    public function getCustomIdColumn(): string
    {
        return 'custom_id';
    }
}
