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
                $numericPart = (int)substr($lastRecord->{$model->getCustomIdColumn()}, strlen($prefix));
                $nextId = $numericPart + 1;
            } else {
                $nextId = 1;
            }

            $model->{$model->getCustomIdColumn()} = $prefix . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        });
    }

    abstract public function getCustomIdPrefix(): string;

    public function getCustomIdColumn(): string
    {
        return 'custom_id';
    }
}
