<div class="rounded-md px-10 mx-3 mb-3" wire:poll.10000ms>
    <form wire:submit.prevent="generate">
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
        <button
            class="w-full bg-green-600 hover:bg-green-700 text-white transition duration-200 rounded-md mt-3 py-2 disabled:opacity-50 flex justify-center">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="ml-2">
                Generate Chat
            </div>
        </button>
    </form>
</div>