<x-layouts.app>
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row mt-5 pt-5">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h2 text-info">{{ $title }}</h1>
                        <a
                            href="{{ route('roles.create') }}"
                            class="btn btn-outline-primary mt-4"
                        >
                            {{ trans('roles.buttons.create') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">{{ trans('roles.table.columns.id') }}</th>
                            <th scope="col">{{ trans('roles.table.columns.name') }}</th>
                            <th scope="col">{{ trans('roles.table.columns.created_at') }}</th>
                            <th scope="col">{{ trans('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $role)
                            <tr>
                                <td>{{ $role->getId() }}</td>
                                <td>{{ $role->getName() }}</td>
                                <td>{{ $role->getCreatedAtDayDateFormat() }}</td>
                                <td class="w-10">
                                    <span class="d-flex p-0 align-items-center">
                                        <a href="{{ $role->url()->edit() }}">
                                            <edit-icon class="w-40"/>
                                        </a>
                                        <form action="{{ $role->url()->destroy() }}" method="POST" class="flex">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn" data-tooltip="{{ trans('Delete') }}">
                                                <trash-icon class="w-100"/>
                                            </button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="d-flex flex-column py-5 align-items-center">
                                <span class="w-10 mb-3">
                                    <empty-roles-icon class="w-100"/>
                                </span>
                                        <span class="text-secondary">{{ trans('roles.table.empty') }}</span>
                                        <a
                                            href="{{ route('roles.create') }}"
                                            class="btn btn-outline-info mt-4"
                                        >
                                            {{ trans('roles.buttons.create') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    {!! $pagination !!}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
