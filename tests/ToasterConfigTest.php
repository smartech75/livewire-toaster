<?php declare(strict_types=1);

namespace Tests;

use MAS\Toaster\ToasterConfig;
use PHPUnit\Framework\TestCase;

final class ToasterConfigTest extends TestCase
{
    /** @test */
    public function it_can_be_serialized_for_the_frontend(): void
    {
        $config = ToasterConfig::fromArray(require __DIR__ . '/../config/toaster.php');

        $array = $config->toJavaScript();

        $this->assertSame(['accessibility' => true, 'duration' => 3000], $array);
    }
}
