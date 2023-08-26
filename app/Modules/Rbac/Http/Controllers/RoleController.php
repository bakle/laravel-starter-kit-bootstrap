<?php declare(strict_types=1);

namespace App\Modules\Rbac\Http\Controllers;

use App\Core\Constants\FormTypes;
use App\Http\Controllers\Controller;
use App\Modules\Rbac\Entities\RoleEntity;
use App\Modules\Rbac\Http\Requests\RoleFormRequest;
use App\Modules\Rbac\Models\Role;
use App\Modules\Rbac\UseCases\StoreOrUpdateRoleUseCase;
use App\Modules\Rbac\ViewModels\RoleFormViewModel;
use App\Modules\Rbac\ViewModels\RoleIndexViewModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request): View
    {
        return view('rbac.roles.index',
            (new RoleIndexViewModel(Role::query(), $request))->build()
        );
    }

    public function create(): View
    {
        return view('rbac.roles.form',
            (new RoleFormViewModel(new Role()))->setFormType(FormTypes::CREATE)->build()
        );
    }

    public function store(RoleFormRequest $request): RedirectResponse
    {
        $role = (new StoreOrUpdateRoleUseCase($request->all(), new Role()))->execute();

        return redirect((new RoleEntity($role))->url()->index())->with('success',
            trans('roles.messages.created'));
    }

    public function edit(Role $role): View
    {
        $role->load('permissions');

        return view('rbac.roles.form',
            (new RoleFormViewModel($role))->setFormType(FormTypes::EDIT)->build()
        );
    }

    public function update(RoleFormRequest $request, Role $role): RedirectResponse
    {
        $role = (new StoreOrUpdateRoleUseCase($request->all(), $role))->execute();

        return redirect((new RoleEntity($role))->url()->index())->with('success',
            trans('roles.messages.updated'));
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect((new RoleEntity(new Role()))->url()->index())->with('success',
            trans('roles.messages.deleted'));
    }
}
