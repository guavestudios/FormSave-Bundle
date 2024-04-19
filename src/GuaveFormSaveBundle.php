<?php

declare(strict_types=1);

namespace Guave\FormSaveBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GuaveFormSaveBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
