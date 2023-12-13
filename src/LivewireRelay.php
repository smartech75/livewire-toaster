<?php declare(strict_types=1);

namespace Masmerise\Toaster;

use Livewire\Component;
use Livewire\Features\SupportEvents\Event;
use Livewire\Livewire;
use Livewire\Mechanisms\HandleComponents\ComponentContext;

use function Livewire\store;

/** @internal */
final readonly class LivewireRelay
{
    public const string EVENT = 'toaster:received';

    public function __invoke(Component $component, ComponentContext $ctx): void
    {
        if (! Livewire::isLivewireRequest()) {
            return;
        }

        if (store($component)->get('redirect')) {
            return;
        }

        if ($toasts = Toaster::release()) {
            foreach ($toasts as $toast) {
                $event = new Event(self::EVENT, $toast->toArray());
                $ctx->pushEffect('dispatches', $event->serialize());
            }
        }
    }
}
