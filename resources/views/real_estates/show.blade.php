<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Real Estate') }}
        </h2>
    </x-slot>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('real_estates.index') }}"> Back</a>
    </div>
    <br/>
    <div>
        <h3>Property type</h3>
        <h4> {{ $real_estate->property_type }}
        <br/>
        <br/>
        <h3>Address</h3>
        <h4> {{ $real_estate->address }}
        <br/>
        <br/>
        <h3>Area</h3>
        <h4> {{ $real_estate->area }}
        <br/>
        <br/>
        <h3>Floor</h3>
        <h4> {{ $real_estate->floor }}
        <br/>
        <br/>
    </div>
</x-app-layout>
