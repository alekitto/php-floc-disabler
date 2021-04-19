<?php

namespace Kcs\FlocDisabler;

class Wordpress
{
    /**
     * Checks the presence of the permissions-policy key and, if not found,
     * set it to disable FLoC.
     *
     * @param array<string, string> $headers
     * @return array<string, string>
     */
    public static function disable(array $headers)
    {
        $headerKeys = array_map('strtolower', array_keys($headers));
        if (in_array('permissions-policy', $headerKeys, true)) {
            return $headers;
        }

        $headers['Permissions-Policy'] = 'interest-cohort=()';

        return $headers;
    }
}
