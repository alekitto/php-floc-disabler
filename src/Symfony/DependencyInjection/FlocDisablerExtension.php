<?php

namespace Kcs\FlocDisabler\Symfony\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class FlocDisablerExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $container
            ->register('kcs.floc_disabler.listener', 'Kcs\FlocDisabler\Symfony\Listener')
            ->addTag('kernel.event_subscriber');
    }
}
