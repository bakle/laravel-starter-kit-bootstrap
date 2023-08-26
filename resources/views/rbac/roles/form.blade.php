<x-layouts.app>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="row mt-5 pt-5">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h2 text-info">{{ $title }}</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="{{ $form->getUrl() }}" method="POST">
                        @csrf
                        @method($form->getMethod())

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ trans('roles.form.fields.name') }}</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="name"
                                value="{{ old('name', $entity->getName()) }}"
                            >
                            @error('name')
                            <label class="form-label">
                                <small class="text-danger">{{ $message }}</small>
                            </label>
                            @enderror
                        </div>

                        <div class="my-3">
                            <p for="name" class="form-label h6">{{ trans('roles.form.fields.permissions') }}</p>

                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-4">
                                        <div class="form-check form-switch ">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                value="{{ $permission->getId() }}"
                                                id="permission"
                                                @if($entity->hasPermission($permission->getId()))
                                                    checked="checked"
                                                @endif
                                                role="switch"
                                                name="permissions[]"
                                            >
                                            <label class="form-check-label" for="permission">
                                                {{ $permission->getLabel() }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="my-5 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                @if($form->isEditType())
                                    {{ trans('Update') }}
                                @else
                                    {{ trans('Create') }}
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
