@extends('layouts.app')

@section('content')
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
                <h2 class="text-xl font-extrabold tracking-wider text-center text-gray-600">Chat with random people.
                </h2>

            </div>
        </div>
    </div>
    @auth
    <div class="items-center justify-center my-5">
        <div class="md:flex items-center justify-center my-3">
            <div class="rounded-md bg-white shadow-md py-5 px-10 mx-3 ">
                <input type="text" placeholder="Masukkan Kode">
                <button>Gabung</button>
            </div>
        </div>
        <div class="md:flex items-center justify-center my-3">
            <div class="md:flex rounded-md bg-white shadow-md py-5 px-20 mx-3 items-center justify-center w-2/6">
                Random Chat
            </div>
            <div class="md:flex rounded-md bg-white shadow-md py-5 px-20 mx-3 items-center justify-center w-2/6">
                Random Group Chat Uwu
            </div>
        </div>
    </div>

    @else
    <div class="md:flex rounded-md bg-white shadow-md py-5 px-10 mx-3 items-center justify-center">
        <div class="my-5 md:my-0">Mau
            <a href=""
                class="rounded-md bg-blue-900 text-white px-4 py-2 mx-2 hover:bg-blue-700 transition duration-200">Login</a>&nbsp;
        </div>
        <div class="my-5 w-full md:w-auto md:my-0">
            Atau
            <a href=""
                class="w-full rounded-md bg-blue-900 text-white px-4 py-2 mx-2 hover:bg-blue-700 transition duration-200">Daftar</a>
        </div>
        <div class="hidden md:block">
            ?
        </div>
    </div>
    @endif
</div>
@endsection