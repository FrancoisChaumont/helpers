<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for file management
 */
class DebugHelper
{
    /**
     * Display a readable var_dump in browser
     *
     * @return void
     */
    public static function var_dump_pre($mixed = null): void
    {
        echo '<pre>';
        var_dump($mixed);
        echo '</pre>';
    }

    /**
     * Capture the result of var_dump into a variable
     *
     * @return string
     */
    public static function var_dump_to_var($mixed): string
    {
        ob_start();
        var_dump($mixed);
        $r = ob_get_clean();

        return $r;
    }

    /**
     * Display the content of any variable and its structure
     * (no circular reference)
     */
    public static function var_export($mixed): void
    {
        var_export($mixed, false);
    }

    /**
     * Display a readable var_dump in browser
     *
     * @return void
     */
    public static function var_export_pre($mixed = null): void
    {
        echo '<pre>';
        var_export($mixed, false);
        echo '</pre>';
    }

    /**
     * Capture the result of var_dump into a variable
     *
     * @return string
     */
    public static function var_export_to_var($mixed): string
    {
        return var_export($mixed, true);
    }

    /**
     * Display a readable print_r in browser
     *
     * @return void
     */
    public static function print_r_pre($mixed = null): void
    {
        echo '<pre>';
        print_r($mixed);
        echo '</pre>';
    }

    /**
     * Preserve the formatting of an echoed string in browser
     *
     * @return void
     */
    public static function echo_pre($txt): void
    {
        echo "<pre>$txt</pre>";
    }
}

