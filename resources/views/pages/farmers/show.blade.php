<x-app-layout>
    <x-slot name='breadcrumb'>
        <li class="breadcrumb-item">
            <a href="{{ route('farmers.index') }}">farmers</a>
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

            <a class="btn btn-secondary" href="{{ route('farmers.create') }}">
                <span class="fa fa-plus"></span>
            </a>
            <a class="btn btn-secondary" href="{{ route('farmers.edit', $record->id) }}">
                <span class="fa fa-pencil"></span>
            </a>
            <form onsubmit="return confirm('Are you sure you want to delete?')"
                action="{{ route('farmers.destroy', $record->id) }}" method="post" style="display: inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-secondary cursor-pointer">
                    <i class="text-danger fa fa-remove"></i>
                </button>
            </form>

        </div>
    </x-slot>

    <x-slot name='content'>
        <div class="row">
            <div class="col-sm-4">
                @include('cards.farmer')
            </div>
        </div>
    </x-slot>
</x-app-layout>
