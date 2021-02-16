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
    <div class="flex" x-data="{ add: false }">
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
                        <input type="checkbox" id="toggle"
                            class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer"
                            wire:model="on_random" />
                        <label for="toggle"
                            class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                    <div>|</div>
                    <button class="mx-2 focus:outline-none" @click="add = !add">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="fixed h-full border-r-2 border-blue-500 pb-28 w-3/12">
                @livewire('chats.chat')
            </div>
        </div>
        <div class="w-9/12 bg-blue-700">
            <div class="h-12 text-white flex justify-between">
                <div class="flex items-center mx-3">Yogi Eka Prastiya - YoKYa</div>
                <div class="flex items-center mx-3">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg></div>
            </div>
            <div class="h-auto bg-blue-200">
                <div class="fixed h-full pb-28 w-9/12">
                    <div class="overflow-y-auto h-full w-full mr-2 pb-16 flex flex-col-reverse" id="journal-scroll">
                        <div class="flex items-center pr-10">
                            <div class="flex flex-col m-4">
                                <div class="font-semibold ml-2 my-1">Yogi Eka Prastiya</div>
                                <div class="w-auto h-auto bg-blue-600 text-white px-3 py-1 rounded-2xl">
                                    <div class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Quisquam mollitia voluptatum commodi ipsam iusto. Unde nam, ex quasi incidunt
                                        qui eius ipsum aspernatur quia beatae expedita nobis magnam, sed laboriosam.
                                    </div>
                                    <div class="text-xs mt-3">1</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end pt-2 pl-10">
                            <div class="flex flex-col m-4">
                                <div class="w-auto h-auto bg-blue-900 text-white px-3 py-1 rounded-2xl">
                                    <div class="text-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Quisquam mollitia voluptatum commodi ipsam iusto. Unde nam, ex quasi incidunt
                                        qui eius ipsum aspernatur quia beatae expedita nobis magnam, sed laboriosam.
                                    </div>
                                    <div class="text-xs mt-3 text-right">2</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full bottom-0 fixed">
                <div class="flex w-full">
                    <textarea class="form-textarea resize-none w-7/12 rounded-lg mx-8 my-5 py-1 px-5 bg-white"
                        id="journal-scroll" maxlength="255"></textarea>
                    <div class="bg-blue-300 rounded-lg ml-2 my-5 py-4 w-1/12 flex justify-center">Kirim</div>
                </div>
            </div>
        </div>
        <div class="fixed h-screen w-full bg-black bg-opacity-70" :class="{ 'hidden': !add }">
            <div class="bg-white shadow-lg mx-auto w-1/3 h-auto mt-16 rounded-md">
                <div class="pt-2 mx-3 mb-3 text-2xl flex justify-end" @click="add = !add">
                    <button class="focus:outline-none">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                {{-- belum --}}
                @livewire('chats.generate', ['on_random' => $on_random]) 
                
                <div class="h-1 bg-gray-400 mx-12 rounded-md my-2"></div>
                <div class="w-full flex justify-start  items-center ml-12">
                    <div>
                        Random
                    </div>
                    <div
                        class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in ml-5">
                        <input type="checkbox" id="toggle"
                            class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer"
                            wire:model="on_random" />
                        <label for="toggle"
                            class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
                <div class="text-sm text-red-700 mx-12">If Random on, you get automatically chat in one time.</div>
                <div class="h-1 bg-gray-400 mx-12 rounded-md my-2"></div>
                @livewire('chats.username')
                <div class="text-sm text-red-700 mx-12 -my-2 pb-5">Search username to chat.</div>
            </div>
        </div>
    </div>


    @push('scripts')
    <script type="text/javascript">
        document.addEventListener("livewire:load", function(event) {
        });
    </script>
    @endpush
</div>