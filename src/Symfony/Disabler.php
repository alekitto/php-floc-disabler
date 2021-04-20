<?php

namespace Kcs\FlocDisabler\Symfony;

use Symfony\Component\HttpFoundation\Response;

class Disabler
{
    public static function disable(Response $response)
    {
        if (! $response->headers->has('Permissions-Policy')) {
            $response->headers->set('Permissions-Policy', 'interest-cohort=()');
            return;
        }

        $current = $response->headers->get('Permissions-Policy', '');
        if (false === strpos($current, 'interest-cohort')) {
            $response->headers->set('Permissions-Policy', $current . ', interest-cohort=()');
        }
    }
}
