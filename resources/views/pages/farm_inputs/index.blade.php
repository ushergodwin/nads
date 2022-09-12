<x-app-layout>
    <x-slot name='breadcrumb'>
        <li class="breadcrumb-item">
            farm inputs
        </li>
    </x-slot>
    <x-slot name='header'>
        <h3><i class="fa fa-list"></i> farm_inputs </h3>
    </x-slot>
    <x-slot name='tools'>
        <a class="btn btn-success btn-sm ml-2 mt-2" href="{{ route('farminputs.create') }}">
            <span class="fa fa-plus"></span> Add a Farm Input
        </a>
    </x-slot>

    <x-slot name='content'>
        <div class="row mt-2">
            @foreach ($records as $record)
                <div class="col-sm-6">
                    @include('cards.farm_input')
                </div>
            @endforeach
        </div>
        {!! $records->render() !!}
    </x-slot>
</x-app-layout>
