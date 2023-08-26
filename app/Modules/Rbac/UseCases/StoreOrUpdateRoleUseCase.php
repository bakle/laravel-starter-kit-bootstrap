<?php declare(strict_types=1);

namespace App\Modules\Rbac\UseCases;

use App\Core\UseCases\BaseFormUseCase;
use Illuminate\Database\Eloquent\Model;

class StoreOrUpdateRoleUseCase extends BaseFormUseCase
{
    public function execute(): Model
    {

        $this->model->name = $this->data['name'];

        $this->model->save();

        $this->model->syncPermissions([$this->data['permissions']]);


        return $this->model;
    }
}
