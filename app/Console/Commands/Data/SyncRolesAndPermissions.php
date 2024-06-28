<?php

declare(strict_types=1);

namespace App\Console\Commands\Data;

use App\Models\User\{Permission, Role};
use App\Support\Enums\User\{PermissionEnum, RoleEnum};
use Illuminate\Console\Command;

class SyncRolesAndPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-roles-and-permissions {--remove-undefined}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync roles and permissions with enums';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if ($this->option('remove-undefined')) {
            Role::query()
                ->whereNotIn('user_roles.name', RoleEnum::cases())
                ->delete();
        }
        foreach (RoleEnum::cases() as $roleEnum) {
            Role::query()->createOrFirst(['name' => $roleEnum]);
        }

        if ($this->option('remove-undefined')) {
            Permission::query()
                ->whereNotIn('user_permissions.name', PermissionEnum::allItems())
                ->delete();
        }
        foreach (PermissionEnum::allItems() as $permissionName) {
            Permission::query()->createOrFirst(['name' => $permissionName]);
        }
    }
}
