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
        $headerNames = array_combine(
            array_map('strtolower', array_keys($headers)),
            array_values($headers)
        );

        if (isset($headerNames['permissions-policy'])) {
            $headerKey = $headerNames['permissions-policy'];
            if (! empty($headerNames[$headerKey]) && false === strpos($headers[$headerKey], 'interest-cohort')) {
                $headers[$headerKey] .= ', interest-cohort=()';
            }
        } else {
            $headers['Permissions-Policy'] = 'interest-cohort=()';
        }

        return $headers;
    }
}
