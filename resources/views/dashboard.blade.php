@extends('welcome')

@section('conten')

<div class="flex justify-center space-x-8">
    
    <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 text-center">
        <a href="/bobot">
        <h2 class="text-lg font-semibold mb-4">Alternatif</h2>
        <p class="text-4xl font-bold">{{ $alternatif }}</p>
        </a>
    </div>

    <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 text-center">
       <a href="/alternatif">
        <h2 class="text-lg font-semibold mb-4">Bobot</h2>
        <p class="text-4xl font-bold">{{ $bobot }}</p>
        </a>
    </div>
</div>


@endsection
