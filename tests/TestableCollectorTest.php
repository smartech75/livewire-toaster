<?php declare(strict_types=1);

namespace Tests;

use Masmerise\Toaster\TestableCollector;
use PHPUnit\Framework\TestCase;

final class TestableCollectorTest extends TestCase
{
    use ToastFactoryMethods;

    /** @test */
    public function it_can_assert_if_toasts_were_dispatched(): void
    {
        $instance = new TestableCollector();

        $instance->assertNothingDispatched();

        $instance->collect($this->aToast());

        $instance->assertDispatched('Crispy toasts');
    }
}
