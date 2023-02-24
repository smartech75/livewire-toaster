<?php declare(strict_types=1);

namespace Tests;

use Masmerise\Toaster\PendingToast;
use Masmerise\Toaster\Toaster;

final class PendingToastTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated_through_static_factory_on_toaster(): void
    {
        $error = Toaster::error('validation.accepted', ['attribute' => 'terms'])->get();
        $this->assertSame([
            'duration' => 3000,
            'message' => 'validation.accepted',
            'type' => 'error',
        ], $error->toArray());

        $info = Toaster::info('Informational')->duration(3500)->get();
        $this->assertSame([
            'duration' => 3500,
            'message' => 'Informational',
            'type' => 'info',
        ], $info->toArray());

        $success = Toaster::success('Successful')->get();
        $this->assertSame([
            'duration' => 3000,
            'message' => 'Successful',
            'type' => 'success',
        ], $success->toArray());

        $warning = Toaster::warning('passwords.reset')->get();
        $this->assertSame([
            'duration' => 3000,
            'message' => 'passwords.reset',
            'type' => 'warning',
        ], $warning->toArray());
    }

    /** @test */
    public function it_can_be_instantiated_with_defaults(): void
    {
        $toast = PendingToast::create()->message('test')->success()->get();

        $this->assertSame([
            'duration' => 3000, // config default
            'message' => 'test',
            'type' => 'success',
        ], $toast->toArray());
    }

    /** @test */
    public function it_will_automatically_dispatch_the_toast_upon_destruction(): void
    {
        Toaster::shouldReceive('collect')->once();

        PendingToast::create()
            ->duration(4000)
            ->error()
            ->message('Uvuvuvwevwe Onyetenyevwe Ughemuhwem Osas');
    }

    /** @test */
    public function it_will_only_dispatch_once(): void
    {
        Toaster::shouldReceive('collect')->once();

        PendingToast::create()
            ->duration(4000)
            ->success()
            ->message('Uvuvuvwevwe Onyetenyevwe Ughemuhwem Osas')
            ->dispatch();
    }
}
