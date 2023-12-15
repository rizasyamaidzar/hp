@extends('welcome')

@section('conten')

<div class="container">
 
<div class="flex items-center">
    <div class="flex items-center ms-2">
        <a href = "\tambahAlternatif">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Alternatif</button>
        </a>
        <a href = "/ranking">
        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Ranking</button>
        </a>
    </div>
</div>
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
                    Merek
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Ram
                </th>
                <th scope="col" class="px-6 py-3">
                    Memori
                </th>
                <th scope="col" class="px-6 py-3">
                    Sinyal
                </th>
                <th scope="col" class="px-6 py-3">
                    Layar
                </th>
                <th scope="col" class="px-6 py-3">
                    Kecepatan Processor
                </th>
                <th scope="col" class="px-6 py-3">
                    Kamera
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            @php $nomor = 1 @endphp
            @foreach($alternatif as $a)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $nomor++ }}
                </th>
                <td class="px-6 py-4">
                    {{ $a->nama }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->merk }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->harga }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->ram }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->memory }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->sinyal }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->layar }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->processor }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->kamera }}
                </td>
                <td class="px-6 py-4">
                    <a href="/alternatif/{{ $a->nama }}/edit" type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="/alternatif/{{ $a->nama }}" method="post">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('Are you sure?')" type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

</div>

@endsection