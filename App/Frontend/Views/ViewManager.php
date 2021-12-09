<?php

namespace App\Frontend\Views;

use Jenssegers\Blade\Blade;

/**
 * ViewManager
 */
class ViewManager
{
    protected static Blade $blade;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Blade $blade)
    {
        self::$blade = $blade;
    }

    /**
     * getViewObject
     *
     * Will return an object of Blade
     *
     * @return Blade
     */
    public static function getViewObject()
    {
        return self::$blade;
    }
}