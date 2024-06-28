<?php

declare(strict_types=1);

namespace App\Support\Enums\User;

enum PermissionEnum: string
{
    /** @return array<int,\BackedEnum> */
    public static function enums(): array
    {
        return [];
    }

    /** @return array<int,string> */
    public static function allItems(): array
    {
        return collect(self::enums())
            ->map(fn (\BackedEnum $enum) => array_map(fn (\BackedEnum $case) => $case->value, get_class($enum)::cases()))
            ->collapse()
            ->unique()
            ->toArray();
    }
}
