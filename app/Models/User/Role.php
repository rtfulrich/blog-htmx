<?php

declare(strict_types=1);

namespace App\Models\User;

use App\Support\Enums\User\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    protected $table = 'user_roles';

    protected function casts()
    {
        return [
            'name' => RoleEnum::class,
        ];
    }
}
