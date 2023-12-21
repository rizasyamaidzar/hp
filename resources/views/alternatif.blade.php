@extends('welcome')

@section('conten')

<div class="container">
 
<div class="flex items-center">
    @can('admin')
    <div class="flex items-center ms-2">
        <a href = "/tambahAlternatif">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Alternatif</button>
        </a>
        <a href = "/ranking">
        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Ranking</button>
        </a>
    </div>
    @endcan
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
                @can('admin')
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                @endcan
            </tr>
            @foreach($alternatif as $a)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $a->nama }}
                </td>
                <td class="px-6 py-4 text-center">
                    @if($a->harga == 5)
                            0-1 jt
                        @elseif($a->harga == 4)
                            1-3 jt
                        @elseif($a->harga == 3)
                            3-5 jt
                        @elseif($a->harga == 2)
                            5-7 jt
                        @else
                            >7 jt
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    @if($a->ram == 5)
                        18
                    @elseif($a->ram == 4)
                        12
                    @elseif($a->ram == 3)
                        8
                    @elseif($a->ram == 2)
                        6
                    @else
                        4
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    @if($a->memory == 5)
                        512
                    @elseif($a->memory == 4)
                        256
                    @elseif($a->memory == 3)
                        128
                    @elseif($a->memory == 2)
                        64
                    @else
                        32
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    @if($a->sinyal == 3)
                        5G
                    @elseif($a->sinyal == 2)
                        4G
                    @else
                        3G
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    @if($a->layar == 5)
                        6.8
                    @elseif($a->layar == 4)
                        6.7
                    @elseif($a->layar == 3)
                        6.6
                    @elseif($a->layar == 2)
                        6.5
                    @else
                        6.4
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    @if($a->processor == 5)
                        2.9 Ghz
                    @elseif($a->processor == 4)
                        2.7 Ghz
                    @elseif($a->processor == 3)
                        2.4 Ghz
                    @elseif($a->processor == 2)
                        2.3 Ghz
                    @else
                        2.2 Ghz
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    @if($a->kamera == 4)
                        >48 Mp
                    @elseif($a->kamera == 3)
                        32 Mp
                    @elseif($a->kamera == 2)
                        16 Mp
                    @else
                        8 Mp
                    @endif
                </td>
                @can('admin')
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="/alternatif/{{ $a->nama }}/edit" type="button" class="focus:outline-none text-white bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm p-3"><i class='bx bx-edit-alt text-lg'></i></a>
                        <form action="/alternatif/{{ $a->nama  }}" method="post">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('Are you sure?')" type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-3 "><i class='bx bx-trash text-lg' ></i></button>
                        </form>
                    </div>
                </td>
                @endcan
            </tr>
            @endforeach
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

</div>

@endsection