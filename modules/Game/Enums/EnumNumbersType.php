<?php

namespace Modules\Game\Enums;

enum EnumNumbersType: string
{
    case AUTO = 'auto';
    case MANUAL = 'manual';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
