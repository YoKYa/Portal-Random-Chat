<div class="bg-blue-600" x-data="{ open: false }">
    <div class="flex justify-between items-center flex-col md:flex-row">
        <div class="flex justify-between px-4 py-4 border-b border-gray-200 md:border-b-0 w-full md:w-auto">
            <div>
                <a href="/" class="text-white font-semibold text-lg">{{ config('app.name') }}</a>
            </div>
            <div>
                <button @click="open = !open" class="text-white focus:outline-none md:hidden">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>
                </button>

            </div>
        </div>
        <div :class="{'hidden': !open}" class="leading-relaxed md:flex justify-between w-full items-center z-10">
            <div class="flex md:items-center flex-col md:flex-row border-b border-gray-200 md:border-b-0 py-2 md:py-0">
                <a href="{{ route('chats.app') }}" class="block @if (Request::is('chats')) text-white @else text-gray-300 @endif hover:text-white px-4 md:py-4 flex items-center active:text-white">
                    
                    <div>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-2">Chats

                    </div>
                </a>
                <a href="#" class="block text-gray-300 hover:text-white px-4 md:py-4 flex items-center">
                    <div class=""><svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg></div>
                    <div class="ml-2">
                        Group Chats
                    </div>
                </a>
                <a href="{{route('about')}}" class="block text-gray-300 hover:text-white px-4 md:py-4 flex items-center">
                    <div><svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                                clip-rule="evenodd" />
                        </svg>

                    </div>
                    <div class="ml-2">
                        About Us
                    </div>
                </a>
                <a href="#" class="block text-gray-300 hover:text-white px-4 md:py-4 flex items-center">
                    <div>
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-2">
                        Help
                    </div>
                </a>
            </div>
            <div class="flex md:items-center flex-col md:flex-row">
                @auth
                <div x-data="{ dropdownIsOpen: false }">
                    <div class="py-3 md:py-0">
                        <button @click="dropdownIsOpen = !dropdownIsOpen"
                            class="flex items-center mr-5 focus:outline-none px-4 md:px-0 w-full">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded object-center object-cover"
                                    src="{{ auth()->user()->gravatar() }}">
                            </div>
                            <div class="block text-gray-300 hover:text-white px-4 md:py-4">
                                {{ auth()->user()->name }}
                            </div>
                        </button>
                    </div>
                    <div :class="{ 'hidden': !dropdownIsOpen }"
                        class="md:absolute md:top-0 md:right-0 md:mr-4 md:mt-14 md:bg-blue-800 md:w-56 md:rounded md:shadow py-1 mb-2 md:mb-0 md:py-3">
                        <a href="{{ route('account.edit') }}"
                            class="block text-gray-300 hover:text-white px-4 md:ml-0 ml-12">Setting</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block text-gray-300 hover:text-white px-4 md:ml-0 ml-12">
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="block text-gray-300 hover:text-white px-4 md:py-4"
                    data-turbolinks="false">Log
                    in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="block text-gray-300 hover:text-white px-4 md:py-4"
                    data-turbolinks="false">Register</a>
                @endif
                @endauth
            </div>
        </div>
    </div>
</div>