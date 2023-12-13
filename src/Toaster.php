<?php declare(strict_types=1);

namespace Masmerise\Toaster;

use Illuminate\Support\Facades\Facade;
use Override;

/**
 * @method static void assertDispatched(string $message)
 * @method static void assertNothingDispatched()
 * @method static void collect(Toast $toast)
 */
final class Toaster extends Facade
{
    public static function config(): ToasterConfig
    {
        return self::$app[ToasterServiceProvider::CONFIG];
    }

    public static function error(string $message, array $replace = []): PendingToast
    {
        return self::toast()->message($message, $replace)->error();
    }

    public static function fake(): TestableCollector
    {
        self::swap($fake = new TestableCollector());

        return $fake;
    }

    public static function info(string $message, array $replace = []): PendingToast
    {
        return self::toast()->message($message, $replace)->info();
    }

    public static function success(string $message, array $replace = []): PendingToast
    {
        return self::toast()->message($message, $replace)->success();
    }

    public static function toast(): PendingToast
    {
        return PendingToast::create();
    }

    public static function warning(string $message, array $replace = []): PendingToast
    {
        return self::toast()->message($message, $replace)->warning();
    }

    #[Override]
    protected static function getFacadeAccessor(): string
    {
        return ToasterServiceProvider::NAME;
    }

    #[Override]
    protected static function getMockableClass(): string
    {
        return Collector::class;
    }
}
