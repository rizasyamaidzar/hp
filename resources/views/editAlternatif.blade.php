@extends('welcome')
@section('conten')

<form method="POST" action="/alternatif/{{ $alternatif->nama }}" class="p-4 md:p-5">
    @method('put')
    @csrf
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama',$alternatif->nama) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                 <select id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="harga">
                    <option value="1" {{ $alternatif->harga == '1' ? 'selected' : '' }} > >7,1 jt</option>
                    <option value="2"{{ $alternatif->harga == '2' ? 'selected' : '' }}> 5,1-7 jt</option>
                    <option value="3"{{ $alternatif->harga == '3' ? 'selected' : '' }}> 3,1-5 jt</option>
                    <option value="4" {{ $alternatif->harga == '4' ? 'selected' : '' }}> 1,1-3 jt</option>
                    <option value="5" {{ $alternatif->harga == '5' ? 'selected' : '' }}> 0-1 jt</option>
                </select>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="ram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ram</label>
                <select id="ram" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="ram">
                    <option value="1" {{ $alternatif->ram == '1' ? 'selected' : '' }}> 4</option>
                    <option value="2"{{ $alternatif->ram == '2' ? 'selected' : '' }}>6</option>
                    <option value="3"{{ $alternatif->ram == '3' ? 'selected' : '' }}>8</option>
                    <option value="4" {{ $alternatif->ram == '4' ? 'selected' : '' }}>12</option>
                    <option value="5" {{ $alternatif->ram == '5' ? 'selected' : '' }}>18</option>
                </select>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="memory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Memori</label>
                <select id="memory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="memory">
                    <option value="1" {{ $alternatif->memory == '1' ? 'selected' : '' }} > 32 </option>
                    <option value="2" {{ $alternatif->memory == '2' ? 'selected' : '' }} >64</option>
                    <option value="3" {{ $alternatif->memory == '3' ? 'selected' : '' }} >128</option>
                    <option value="4" {{ $alternatif->memory == '4' ? 'selected' : '' }} >256</option>
                    <option value="5" {{ $alternatif->memory == '5' ? 'selected' : '' }} >512</option>
                </select>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="sinyal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinyal</label>
                <select id="sinyal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="sinyal">
                    <option value="1" {{ $alternatif->sinyal == '1' ? 'selected' : '' }}> 3G</option>
                    <option value="2" {{ $alternatif->sinyal == '2' ? 'selected' : '' }}>4G</option>
                    <option value="3" {{ $alternatif->sinyal == '3' ? 'selected' : '' }}>5G</option>
                </select>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="layar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Layar</label>
                <select id="layar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="layar">
                    <option value="1" {{ $alternatif->layar == '1' ? 'selected' : '' }}>6.4</option>
                    <option value="2" {{ $alternatif->layar == '2' ? 'selected' : '' }}>6.5</option>
                    <option value="3" {{ $alternatif->layar == '3' ? 'selected' : '' }}>6.6</option>
                    <option value="4" {{ $alternatif->layar == '4' ? 'selected' : '' }}>6.7</option>
                    <option value="5" {{ $alternatif->layar == '5' ? 'selected' : '' }}>6.8</option>
                </select>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="processor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecepatan Processor</label>
                <select id="processor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="processor">
                    <option value="1" {{ $alternatif->processor == '1' ? 'selected' : '' }}  > 2.2</option>
                    <option value="2" {{ $alternatif->processor == '2' ? 'selected' : '' }}  >2.3</option>
                    <option value="3" {{ $alternatif->processor == '3' ? 'selected' : '' }}  >2.4</option>
                    <option value="4" {{ $alternatif->processor == '4' ? 'selected' : '' }}  >2.7</option>
                    <option value="5" {{ $alternatif->processor == '5' ? 'selected' : '' }}  >2.9</option>
                </select>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="kamera" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kamera</label>
                <select id="kamera" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="kamera">
                    <option value="1" {{  $alternatif->kamera == '1' ? 'selected' : '' }}>8</option>
                    <option value="2" {{  $alternatif->kamera == '2' ? 'selected' : '' }}>16</option>
                    <option value="3" {{  $alternatif->kamera == '3' ? 'selected' : '' }}>32</option>
                    <option value="4" {{  $alternatif->kamera == '4' ? 'selected' : '' }}>>48</option>
                </select>
            </div>
            
        </div>
        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Update Alternatif
        </button>
    </form>

@endsection