<x-app-layout>
    <x-slot name='breadcrumb'>
        <li class="breadcrumb-item">
            <a href="{{ route('distributions.index') }}">distributions</a>
        </li>
        <li class="breadcrumb-item">
            {{ $record->id }}
        </li>
    </x-slot>
    <x-slot name='header'>
        <h3><i class="fa fa-eye"></i> {{ $record->id }}</h3>
    </x-slot>
    <x-slot name='tools'>
        <div class="btn-group">

        </div>
    </x-slot>

    <x-slot name='content'>
        <div class="row">
            <div class="col-12">
                <div class="card card-body shadow mt-3">
                    @include('cards.distribution')
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
