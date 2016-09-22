<?php
namespace f2r\FPM;

class Delay
{
    private static $callbacks = null;

    private static function registerShutdown()
    {
        \register_shutdown_function(function(){
            if (function_exists('\fastcgi_finish_request')) {
                \fastcgi_finish_request();
            }
            foreach (Delay::$callbacks as $callback) {
                \call_user_func($callback);
            }
        });
    }


    public static function register(callable $callback)
    {
        if (self::$callbacks === null) {
            self::registerShutdown();
            self::$callbacks = [];
        }
        self::$callbacks[] = $callback;
    }
}
