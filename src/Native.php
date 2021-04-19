<?php

namespace Kcs\FlocDisabler;

class Native
{
    private static $headerAdded = false;

    /**
     * Sets the Permissions-Policy header to disable Google FLoC.
     */
    public static function disable()
    {
        if (self::$headerAdded) {
            return;
        }

        if (\headers_sent($filename, $line)) {
            \trigger_error(\sprintf('Headers already sent in %s, line %d. Cannot add FLoC disabler header.', $filename, $line), E_USER_WARNING);
            return;
        }

        \header('Permissions-Policy: interest-cohort=()', false);
        self::$headerAdded = true;
    }

    /**
     * Needs to be called after the response has been sent, in case
     * of long-running process.
     */
    public static function reset()
    {
        self::$headerAdded = false;
    }
}
