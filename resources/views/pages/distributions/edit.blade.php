<x-app-layout>
    <x-slot name='breadcrumb'>
        <li class="breadcrumb-item">
            <a href="{{ route('distributions.index') }}">distributions</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('distributions.show', $model->id) }}">{{ $model->id }}</a>
        </li>
        <li class="breadcrumb-item">
            Edit
        </li>
    </x-slot>
    <x-slot name='header'>
        <h3><i class="fa fa-pencil"></i> Edit {{ $model->id }}</h3>
    </x-slot>

    <x-slot name='tools'>
        <a class="btn btn-secondary" href="{{ route('distributions.create') }}">
            <span class="fa fa-plus"></span>
        </a>
    </x-slot>

    <x-slot name='content'>
        <div class="row">
            <div class='col-md-12'>
                <div class='card shadow mt-3'>
                    <div class="card-body">
                        @include('forms.distribution', [
                            'route' => route('distributions.update', $model->id),
                            'method' => 'PUT',
                        ])
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
