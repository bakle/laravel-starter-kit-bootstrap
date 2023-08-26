<?php declare(strict_types=1);

namespace App\Modules\Rbac\ViewModels;

use App\Core\Forms\Form;
use App\Core\ViewModels\BaseFormViewModel;
use App\Modules\Rbac\Entities\PermissionEntity;
use App\Modules\Rbac\Entities\RoleEntity;
use Spatie\Permission\Models\Permission;

class RoleFormViewModel extends BaseFormViewModel
{
    protected function getEntityClass(): string
    {
        return RoleEntity::class;
    }


    protected function getForm(): Form
    {
        return new Form($this->resolveFormUrl(), $this->formType);
    }

    protected function getExtraAttributes(): array
    {
        return [
            'permissions' => PermissionEntity::collection(Permission::query()->latest()->select(['id', 'name'])->get())
        ];
    }
}
