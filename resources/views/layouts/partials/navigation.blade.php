<div class="bg-gray-900" x-data="{ open: false }">
    <div class="flex justify-between items-center flex-col md:flex-row">
        <div class="flex justify-between px-4 py-4 border-b border-gray-500 md:border-b-0 w-full md:w-auto">
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
        <div :class="{'hidden': !open}" class="leading-relaxed md:flex justify-between w-full md:items-center">
            <div class="flex md:items-center flex-col md:flex-row border-b border-gray-700 md:border-b-0 py-2 md:py-0">
                <a href="#" class="block text-gray-300 hover:text-white px-4 md:py-4">Home</a>
                <a href="#" class="block text-gray-300 hover:text-white px-4 md:py-4">Chats</a>
                <a href="#" class="block text-gray-300 hover:text-white px-4 md:py-4">Group Chats</a>
                <a href="#" class="block text-gray-300 hover:text-white px-4 md:py-4">About Us</a>
                <a href="#" class="block text-gray-300 hover:text-white px-4 md:py-4">Help</a>
            </div>
            <div class="flex md:items-center flex-col md:flex-row">
                @auth
                <div x-data="{ dropdownIsOpen: false }" class="py-2">
                    <div>
                        <button @click="dropdownIsOpen = !dropdownIsOpen" class="flex items-center mr-5 focus:outline-none px-4 md:px-0 w-full">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded object-center object-cover" src="{{ auth()->user()->gravatar() }}" >
                            </div>
                            <div class="block text-gray-300 hover:text-white px-4 md:py-4">
                                {{ auth()->user()->name }}
                            </div>
                        </button>
                    </div>
                    <div :class="{ 'hidden': !dropdownIsOpen }" class="md:absolute md:top-0 md:right-0 md:mr-4 md:mt-14 md:bg-gray-800 md:w-56 md:rounded md:shadow py-1 md:py-3">
                        <a href="" class="block text-gray-300 hover:text-white px-4 md:ml-0 ml-12">Profile</a>
                        <a href="" class="block text-gray-300 hover:text-white px-4 md:ml-0 ml-12">Setting</a>
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
                <a href="{{ route('login') }}" class="block text-gray-300 hover:text-white px-4 md:py-4" data-turbolinks="false">Log
                    in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="block text-gray-300 hover:text-white px-4 md:py-4" data-turbolinks="false">Register</a>
                @endif
                @endauth
            </div>
        </div>
    </div>
</div>