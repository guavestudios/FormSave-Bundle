<?php

namespace Guave\FormSaveBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GuaveFormSaveBundle extends Bundle
{
    public function getPath(): string
    {
        return dirname(__DIR__);
    }
}
