<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Games
    </h2>
</x-slot>
<div class="py-12 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-green-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif

            <button wire:click="creategames()"
                class="bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded my-3">Tambah
                Data</button>


            <!-- <input type="search" placeholder="Search"
                class=" bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal float-right"> -->

            <input type="search"
                class="bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal float-right"
                placeholder="Search" aria-label="Search" aria-describedby="search-addon" wire:model="search">

            @if($isModal)
            @include('livewire.creategames')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-black  text-white font-bold py-2 px-4 rounded my-3">
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Genre</th>
                        <!-- <th class="px-4 py-2">Creator</th> -->
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($games as $row)
                    <tr class="text-white bg-gray-800 font-bold py-2 px-4 rounded my-3">
                        <td class="border px-4 py-2">{{ $row->game }}</td>
                        <td class="border px-4 py-2">{{ $row->genre }}</td>
                        <!-- <td class="border px-4 py-2">{{ $row->deskripsi }}</td> -->
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $row->id }})"
                                class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $row->id }})"
                                class="bg-gray-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            <!-- <button wire:click="show({{ $row->id }})"
                                class="bg-gray-900 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Detail</button> -->
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-black border px-4 py-2 text-center" colspan="4">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>