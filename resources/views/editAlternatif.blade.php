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
                <label for="merk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merek</label>
                <input type="text" name="merk" id="merk" value="{{ old('merk',$alternatif->merk) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                <input type="number" name="harga" id="price" value="{{ old('harga',$alternatif->harga) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="ram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ram</label>
                <input type="number" name="ram" id="ram" value="{{ old('ram',$alternatif->ram) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="memory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Memori</label>
                <input type="number" name="memory" id="memory" value="{{ old('memory',$alternatif->memory) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="sinyal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinyal</label>
                <input type="number" name="sinyal" id="sinyal" value="{{ old('sinyal',$alternatif->sinyal) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="layar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Layar</label>
                <input type="number" name="layar" id="layar" value="{{ old('layar',$alternatif->layar) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="procesor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Processor</label>
                <input type="number" name="processor" id="procesor" value="{{ old('processor',$alternatif->processor) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="kamera" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kamera</label>
                <input type="number" name="kamera" id="kamera" value="{{ old('kamera',$alternatif->kamera) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
            </div>
            
        </div>
        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Update Alternatif
        </button>
    </form>

@endsection