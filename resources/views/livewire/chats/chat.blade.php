<div class="overflow-y-auto h-full w-full mr-2 flex flex-col" id="journal-scroll" wire:poll.1000ms>
    @if (!empty($gchats))
    @foreach ($gchats as $gchat)
    <div class="border-b-2 border-white h-20 bg-blue-200 hover:cursor-pointer" wire:click="getGchat({{ $gchat->id }})">
        @foreach ($gchat->user as $user)
        @if ($user->id != auth()->user()->id)
        <div class="mx-2 my-4 flex items-center">
            <div>
                <img class="w-8 h-8 rounded object-center object-cover" src="{{ $user->gravatar() }}">
            </div>
            <div class="ml-4">
                <div class="font-semibold">{{ $user->name }}</div>
                <div class="text-sm">@ {{ $user->username }}</div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endforeach
    @endif
</div>