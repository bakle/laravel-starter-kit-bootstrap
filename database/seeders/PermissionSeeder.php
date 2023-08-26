<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Rbac\Constants\Permissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Permissions::cases() as $permission) {
            Permission::query()->firstOrCreate([
                'name' => $permission->value
            ]);
        }
    }
}
