<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CustomLogger
{
    protected $channel = 'custom';

    public function log($level, $message, $customId = null, array $context = [])
    {
        $logData = [
            'user_id' => Auth::check() ? Auth::id() : 'guest',
            'route' => request()->route() ? request()->route()->getName() : request()->path(),
            'custom_id' => $customId,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'message' => $message,
        ] + $context;

        Log::channel($this->channel)->$level($message, $logData);
    }

    public function info($message, $customId = null, array $context = [])
    {
        $this->log('info', $message, $customId, $context);
    }

    public function error($message, $customId = null, array $context = [])
    {
        $this->log('error', $message, $customId, $context);
    }

    public function warning($message, $customId = null, array $context = [])
    {
        $this->log('warning', $message, $customId, $context);
    }

    public function debug($message, $customId = null, array $context = [])
    {
        $this->log('debug', $message, $customId, $context);
    }
}
