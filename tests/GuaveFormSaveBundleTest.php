<?php

declare(strict_types=1);

namespace Guave\FormSaveBundle\Tests;

use Guave\FormSaveBundle\GuaveFormSaveBundle;
use PHPUnit\Framework\TestCase;

class GuaveFormSaveBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new GuaveFormSaveBundle();

        $this->assertInstanceOf('Guave\FormSaveBundle\GuaveFormSaveBundle', $bundle);
    }
}
