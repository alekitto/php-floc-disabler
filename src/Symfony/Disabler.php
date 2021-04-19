<?php

namespace Kcs\FlocDisabler\Symfony;

use Symfony\Component\HttpFoundation\Response;

class Disabler
{
    public static function disable(Response $response)
    {
        if ($response->headers->has('Permissions-Policy')) {
            return;
        }

        $response->headers->set('Permissions-Policy', 'interest-cohort=()');
    }
}
