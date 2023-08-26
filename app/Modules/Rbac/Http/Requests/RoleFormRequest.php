<?php declare(strict_types=1);

namespace App\Modules\Rbac\Http\Requests;

use App\Modules\Rbac\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class RoleFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return Role::getRules();
    }
}
