<?php declare(strict_types=1);

namespace MAS\Toast;

use JsonSerializable;

enum ToastType: string implements JsonSerializable
{
    case Error = 'error';
    case Info = 'info';
    case Success = 'success';
    case Warning = 'warning';

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}