<?php declare(strict_types=1);

namespace Masmerise\Toaster;

enum ToastType: string
{
    case Error = 'error';
    case Info = 'info';
    case Success = 'success';
    case Warning = 'warning';
}
