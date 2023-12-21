@extends('welcome')

@section('conten')



<div class="w-full mx-auto max-w-4xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col items-center pb-10">
        <img class="w-32 h-32 mb-3 my-10 rounded-full shadow-lg" src="img/{{ auth()->user()->foto }}" alt="Bonnie image"/>
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ auth()->user()->name }}</h5>
        <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">{{ auth()->user()->nim }}</p>
        <div class="flex mt- md:mt-6">
            <a href="#" class="inline-flex items-center mx-4 px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">{{ auth()->user()->email }}</a>
            <a href="#" class="inline-flex items-center px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ auth()->user()->jabatan }}</a>
            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">{{ auth()->user()->nohp }}</a>
        </div>
    </div>
</div>



@endsection