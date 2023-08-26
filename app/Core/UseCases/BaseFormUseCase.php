<?php declare(strict_types=1);

namespace App\Core\UseCases;

use Illuminate\Database\Eloquent\Model;

abstract class BaseFormUseCase
{

    public function __construct(protected readonly array $data, protected Model $model)
    {
    }

    abstract public function execute(): Model;
}
