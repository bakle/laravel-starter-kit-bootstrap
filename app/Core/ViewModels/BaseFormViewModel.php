<?php declare(strict_types=1);

namespace App\Core\ViewModels;

use App\Core\Constants\FormTypes;
use App\Core\Entities\BaseEntity;
use App\Core\Forms\Form;
use Illuminate\Database\Eloquent\Model;
use ReflectionClass;

abstract class BaseFormViewModel
{
    protected FormTypes $formType;

    abstract protected function getEntityClass(): string;

    abstract protected function getForm(): Form;

    public function __construct(protected readonly Model $model, protected readonly ?Model $secondaryModel = null)
    {
    }

    public function setFormType(FormTypes $formType): self
    {
        $this->formType = $formType;

        return $this;
    }

    public function build(): array
    {
        return [
            'entity' => $this->getEntity(),
            'form' => $this->getForm(),
            'title' => $this->getTitle(),
            ...$this->getExtraAttributes()
        ];
    }


    protected function getExtraAttributes(): array
    {
        return [];
    }

    protected function getEntity(): BaseEntity
    {
        $class = new ReflectionClass($this->getEntityClass());

        return $class->newInstance($this->model, $this->secondaryModel);
    }

    protected function resolveFormUrl(): string
    {
        return match ($this->formType) {
            FormTypes::EDIT => $this->getEntity()->url()->update(),
            default => $this->getEntity()->url()->store(),
        };
    }

    private function getFormType(): FormTypes
    {
        return $this->formType;
    }

    private function getTitle(): string
    {
        $type = $this->isCreateFormType() ? trans('Create') : trans('Edit');

        return $type . ' ' . $this->getEntity()->getModelName();
    }

    private function isCreateFormType(): bool
    {
        return $this->getFormType() == FormTypes::CREATE;
    }
}
