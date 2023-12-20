@extends('welcome')
@section('conten')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                  No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama 
                </th>
                <th scope="col" class="px-6 py-3">
                    Hasil Perhitungan
                </th>
                <th scope="col" class="px-6 py-3">
                    Ranking
                </th>
                
            </tr>
        </thead>
        <tbody>
           
            @foreach($hasil as $h)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4">
                    {{ $h['nama'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $h['hasil'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $h['rank'] }}
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection