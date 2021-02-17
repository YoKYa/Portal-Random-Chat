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
    <div class="flex" x-data="{ add: false }" x-data="{ bil: false }">
        <div class="md:w-4/12 w-full bg-blue-700 border-blue-500 border-r-2 md:block {{ $h1 }}">
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
                    <div class="md:hidden absolute bg-blue-500 bottom-8 w-12 h-12 flex items-center justify-center rounded-full right-8 hover:cursor-pointer z-40" wire:click="m">
                        <div class="mx-3 " >
                            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed h-full border-r-2 border-blue-500 pb-28 md:w-4/12 w-full">
                @livewire('chats.chat')
            </div>
        </div>
        <div class="md:w-8/12 w-full bg-blue-700 md:block {{ $h2 }}">
            @livewire('chats.chatting')
        </div>

        {{-- Tombol Generate --}}
        <div class="fixed h-screen w-full bg-black bg-opacity-70" :class="{ 'hidden': !add }">
            <div class="bg-white shadow-lg mx-auto md:w-1/3 w-10/12 h-auto mt-16 rounded-md">
                <div class="pt-2 mx-3 mb-3 text-2xl flex justify-end" @click="add = !add">
                    <button class="focus:outline-none">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
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