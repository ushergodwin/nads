<x-app-layout>
    <x-slot name="breadcrumb">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="header">
    </x-slot>

    <x-slot name="tools"></x-slot>
    <x-slot name="content">
        <div class="py-12">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="row m-1">
                        @foreach ($stats as $key => $item)
                            <div class="col-md-12 col-lg-4">
                                <div class="card card-body shadow mt-1">
                                    {{ strtoupper(str_replace('_', ' ', $key)) }}
                                    <span class="badge badge-success">
                                        {{ $item }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
