<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Details Games
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Details Games
            </h2>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <input wire:click="" type="image" src="/images/tumblr_64d7c3cbcfd84ad7a8af2c7843a2636a_db2e9ecd_540.gif"
                    width="" height="" />
                <img src="/images/tumblr_64d7c3cbcfd84ad7a8af2c7843a2636a_db2e9ecd_540.gif"
                    class="img-fluid mx-auto d-block" alt="...">
                <img src="/images/tenor.gif" class="rounded float-start" alt="..." width="" height="">
                <img src="/images/tenor_2.gif" class="rounded mx-auto d-block" alt="..." width="" height="">
                <img src="/images/tumblr_64d7c3cbcfd84ad7a8af2c7843a2636a_db2e9ecd_540.gif" class="rounded float-end"
                    alt="..." width="" height="">

            </div>

        </div>
    </div>
</div>