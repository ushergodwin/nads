<x-app-layout>
    <x-slot name='breadcrumb'>
        <li class="breadcrumb-item">
            distributions
        </li>
    </x-slot>
    <x-slot name='header'>
        <h3><i class="fa fa-list"></i> Distributions </h3>
    </x-slot>

    <x-slot name='tools'>
        @if (Auth::user()->type === 'admin')
            <a class="btn btn-success btn-sm ml-3 mt-2" href="{{ route('distributions.create') }}">
                <span class="fa fa-plus"></span> Add a Distribution
            </a>
        @endif
    </x-slot>

    <x-slot name='content'>
        <div class="row">
            @foreach ($records as $record)
                <div class="col-sm-6">
                    @include('cards.distribution')
                </div>
            @endforeach
        </div>
        {!! $records->render() !!}
    </x-slot>

</x-app-layout>
