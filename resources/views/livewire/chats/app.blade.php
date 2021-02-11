<div class="-mt-12">
    <style>
        #journal-scroll::-webkit-scrollbar {
            width: 5px;
            cursor: pointer;
            background-color: rgba(229, 231, 235, 0.);

        }

        #journal-scroll::-webkit-scrollbar-track {
            background-color: rgba(229, 231, 235, var(--bg-opacity));
            cursor: pointer;
            /*background: red;*/
        }

        #journal-scroll::-webkit-scrollbar-thumb {
            cursor: pointer;
            background-color: #7db1f5;
            /*outline: 1px solid slategrey;*/
        }
    </style>
    @section('title', 'Chats')
    <div class="flex">
        <div class="w-3/12 bg-blue-700 border-blue-500 border-r-2">
            <div class="h-12 text-white antialiased text-sm">Top</div>
            <div class="fixed h-full border-r-2 border-blue-500 pb-28 w-3/12">
                <div class="hover:overflow-y-auto h-full w-full mr-2" id="journal-scroll">
                    <div class="border-b-2 border-white h-20 bg-blue-200">

                    </div>
                    <div class="border-b-2 border-white h-20 bg-blue-200">

                    </div>
                    <div class="border-b-2 border-white h-20 bg-blue-200">

                    </div>
                    <div class="border-b-2 border-white h-20 bg-blue-300">

                    </div>
                    <div class="border-b-2 border-white h-20 bg-blue-200">

                    </div>
                    <div class="border-b-2 border-white h-20 bg-blue-200">

                    </div>
                    <div class="border-b-2 border-white h-20 bg-blue-200">

                    </div>
                    <div class="border-b-2 border-white h-20 bg-blue-200">

                    </div>
                </div>
            </div>
        </div>
        <div class="w-9/12 bg-blue-700">
            <div class="h-12 text-white">
                Top
            </div>
            <div class="h-auto bg-blue-200">
                <div class="fixed h-full pb-28 w-9/12">
                    <div class="hover:overflow-y-auto h-full w-full mr-2 pb-16" id="journal-scroll">
                        <div class="rounded-lg bg-blue-300 w-auto h-auto border-blue-500 border-2">
                            hahah
                        </div>
                        <div class="rounded-lg bg-blue-100 w-auto h-auto border-blue-500 border-2">
                            XD
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full bottom-0 fixed">
                <div class="flex w-full">
                    <div class="w-7/12 rounded-lg mx-8 my-5 py-4 px-5 bg-white">Input</div>
                    <div class="bg-blue-300 rounded-lg ml-2 my-5 py-4 w-1/12 flex justify-center">Kirim</div>
                </div>
            </div>
        </div>
    </div>
    {{-- <button wire:click="uwu">Klik</button> --}}

    @push('scripts')
    <script type="text/javascript">
        document.addEventListener("livewire:load", function(event) {
        window.livewire.emit('load_edit');
    });

    </script>
    @endpush
</div>