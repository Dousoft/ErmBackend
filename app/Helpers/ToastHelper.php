<?php

namespace App\Helpers;

class ToastHelper
{
    public static function success(string $message)
    {
        session()->flash('toast', [
            'type' => 'success',
            'message' => $message,
        ]);
    }

    public static function error(string $message)
    {
        session()->flash('toast', [
            'type' => 'error',
            'message' => $message,
        ]);
    }
}
