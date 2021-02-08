@section('title', 'Welcome')
<div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">
    <div class="flex items-center justify-center my-5">
        <div class="flex flex-col justify-around">
            <div class="space-y-6">
                <a href="{{ route('home') }}">
                    <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
                </a>
                <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                    {{ config('app.name') }}
                </h1>
                <h2 class="text-xl font-extrabold tracking-wider text-center text-gray-600">Chat with random people +62.
                </h2>

            </div>
        </div>
    </div>
    @auth
    <div class="mb-7">
        <div class="md:flex md:items-center md:justify-center my-3">
            <form action="#" wire:submit.prevent="join">
                <div class="rounded-md bg-white shadow-md py-5 px-10 mx-3 ">
                    <input type="text" placeholder="Insert Code" wire:model="code" class="w-full">
                    <button
                        class="w-full bg-gray-700 text-white hover:bg-gray-800 transition duration-200 rounded-md mt-3 py-2">Join</button>
                </div>
            </form>
        </div>

        <div class="md:flex justify-center items-center">
            <div class=" block md:flex w-auto rounded-md bg-white shadow-md py-5 px-20 my-3 mx-3 items-center justify-center md:w-2/6">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                </svg>
                Random Chat
            </div>
            <div class=" block md:flex w-auto rounded-md bg-white shadow-md py-5 px-20 my-3 mx-3 items-center justify-center md:w-2/6">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                Random Group
            </div>
        </div>
    </div>
    @else
    <div class="flex justify-center items-center">
        <div class="md:flex rounded-md bg-white shadow-md py-5 px-10 mx-3 w-auto">
            <div class="my-5 md:my-0">Mau
                <a href="{{ route('login') }}"
                    class="rounded-md bg-blue-900 text-white px-4 py-2 mx-2 hover:bg-blue-700 transition duration-200">Login</a>&nbsp;
            </div>
            <div class="my-5 w-full md:w-auto md:my-0">
                Atau
                <a href="{{ route('register') }}"
                    class="w-full rounded-md bg-blue-900 text-white px-4 py-2 mx-2 hover:bg-blue-700 transition duration-200">Daftar</a>
            </div>
            <div class="hidden md:block">
                ?
            </div>
        </div>
    </div>

    @endif
    @error('code')
    <div
        class="absolute bg-red-100 text-red-800 border-l-4 border-red-500 mt-4 ml-5 top-20 left-5 p-3 w-auto text-left">
        {{ $message }}
    </div>
    @enderror
</div>