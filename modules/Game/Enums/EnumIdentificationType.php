<?php

namespace Modules\Game\Enums;

enum EnumIdentificationType: string
{
    case LICENSE = 'license';
    case CITIZENSHIP = 'citizenship';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
