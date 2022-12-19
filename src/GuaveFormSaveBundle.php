<?php

namespace Guave\FormSaveBundle;

use Guave\FormSaveBundle\DependencyInjection\GuaveFormSaveExtension;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class GuaveFormSaveBundle extends Bundle
{
    /**
     * Register extension
     *
     * @return Extension
     */
    public function getContainerExtension(): Extension
    {
        return new GuaveFormSaveExtension();
    }
}
