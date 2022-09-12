<x-app-layout>
    <x-slot name='breadcrumb'>
        <li class="breadcrumb-item">
            farmers
        </li>
    </x-slot>
    <x-slot name='header'>
        <h3><i class="fa fa-list"></i> farmers </h3>
    </x-slot>
    <x-slot name='tools'>
        @if (Auth::user()->type === 'admin')
            <a class="btn btn-success btn-sm mt-2 ml-2" href="{{ route('farmers.create') }}">
                <span class="fa fa-plus"></span> Add a Farmer
            </a>
        @endif
    </x-slot>

    <x-slot name='content'>
        <div class="row">
            @foreach ($records as $record)
                <div class="col-sm-6">
                    <div class="card card-body shadow mt-3">
                        @include('cards.farmer')
                    </div>
                </div>
            @endforeach
        </div>
        {!! $records->render() !!}
    </x-slot>
</x-app-layout>
