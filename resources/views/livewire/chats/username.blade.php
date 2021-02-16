<div class="rounded-md py-5 px-10 mx-3 ">
    <form wire:submit.prevent="join_username">
        @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-400 py-2 mb-2 px-1">
            {{ session('message') }}
        </div>
        @endif
        @if(session()->has('message_error'))
        <div class="bg-red-100 border-l-4 border-red-400 py-2 mb-2 px-1">
            {{ session('message_error') }}
        </div>
        @endif
        <input type="text" placeholder="Username" class="w-full border-gray-300 rounded-md" required
            wire:model="username">
        <button
            class="w-full bg-blue-600 hover:bg-blue-700 text-white transition duration-200 rounded-md mt-3 py-2 disabled:opacity-50 disabled:bg-blue-800">Join</button>
    </form>
</div>