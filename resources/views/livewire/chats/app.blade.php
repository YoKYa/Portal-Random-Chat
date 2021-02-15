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

        .toggle-checkbox:checked {
            @apply: right-0 border-blue-400;
            right: 0;
            border-color: #2E86C1;
        }

        .toggle-checkbox:checked+.toggle-label {
            @apply: bg-blue-700;
            background-color: #85C1E9;
        }
    </style>
    @section('title', 'Chats')
    <div class="flex">
        <div class="w-3/12 bg-blue-700 border-blue-500 border-r-2">
            {{-- Top Chat --}}
            <div class="h-12 text-white antialiased text-sm flex items-center justify-between">
                <div class="mx-3 flex items-center font-semibold tracking-widest">
                    <div>
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <div class="ml-2">
                        Chats
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <div class="mx-2 flex">
                        <div class="text-xs">
                            Random
                        </div>
                        <div class="-mt-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </div>
                    </div>
                    <div
                        class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="toggle" id="toggle"
                            class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                        <label for="toggle"
                            class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                    <div>|</div>
                    <div class="mx-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

            </div>
            {{-- Chat --}}
            <div class="fixed h-full border-r-2 border-blue-500 pb-28 w-3/12">
                <div class="overflow-y-auto h-full w-full mr-2" id="journal-scroll">
                    @foreach ($chats_list as $item)
                    <div class="border-b-2 border-white h-20 bg-blue-200">
                        {{ $item->id }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-9/12 bg-blue-700">
            <div class="h-12 text-white">
                Topi
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

    @push('scripts')
    <script type="text/javascript">
        document.addEventListener("livewire:load", function(event) {
            window.livewire.emit('load_chats');
        });
    </script>
    @endpush
</div>