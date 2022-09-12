<x-app-layout>
    <x-slot name='breadcrumb'>
        <li class="breadcrumb-item">
            <a href="{{ route('farmers.index') }}">farmers</a>
        </li>
        <li class="breadcrumb-item">
            Create
        </li>
    </x-slot>
    <x-slot name='header'>
        <h3><i class="fa fa-plus"></i> Create New farmers</h3>
    </x-slot>
    <x-slot name='tools'>
    </x-slot>
    <x-slot name='content'>
        <div class="row">
            <div class='col-md-12'>
                <div class="card card-body shadow mt-3">
                    @include('forms.farmer')
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
