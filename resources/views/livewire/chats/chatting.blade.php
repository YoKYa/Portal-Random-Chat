<div class="w-full bg-blue-700" wire:poll.1000ms>
    <div class="h-12 text-white flex justify-between md:flex" x-data="{ ops: false }">
        <div class="flex items-center mx-3">
            <div class="mx-2 md:hidden hover:cursor-pointer" wire:click="m">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
                  </svg>
            </div>
            @if (!empty($gravatar))
            <div class="mx-2">
                <img class="w-8 h-8 rounded object-center object-cover" src="{{ $gravatar }}">
            </div>
            @endif

            @if (!empty($namechat))
            {{ $namechat }}

            @endif
            @if (!empty($usernamechat))
            - @ {{ $usernamechat }}
            @endif

        </div>
        <div class="flex items-center mx-3">
            @if (!empty($gchatId))
            <button @click="ops = !ops" class="text-white focus:outline-none ">
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </button>
            @endif

        </div>
        <div :class="{ 'hidden': !ops }"
            class="absolute md:top-0 right-0 mr-4 md:mt-28 mt-2 mr-16 md:bg-blue-800 md:w-56 md:rounded md:shadow py-1 mb-2 md:mb-0 md:py-3 z-10">
            <div class="block text-gray-300 hover:text-white px-4 md:ml-0 ml-12 hover:cursor-pointer"
                wire:click="delete">Delete Chat</div>
        </div>
    </div>
    <div class="h-auto bg-blue-200">
        <div class="fixed h-full pb-28 md:w-8/12 w-full">
            <div class="overflow-y-auto h-full w-full mr-2 pb-16 flex flex-col-reverse bg-blue-200" id="journal-scroll">

                @if (!empty($list))
                @foreach ($list as $chat)
                @if ($chat->user_id == auth()->id())
                <div class="flex justify-end items-center pt-2 pl-10">
                    <div class="flex flex-col m-4">
                        <div class="font-semibold mr-2 my-1 text-right">{{ auth()->user()->name }}</div>
                        <div class="w-auto h-auto bg-blue-900 text-white px-3 py-1 rounded-2xl">
                            <div class="text-right">
                                @if ( $chat->body == "bAdmin")
                                you have entered this chat.
                                @else
                                {{ $chat->body  }}
                                @endif
                            </div>
                            <div class="text-xs mt-3 text-right">{{ $chat->published }}</div>
                        </div>
                    </div>
                </div>
                @else
                <div class="flex justify-start items-center pr-10">
                    <div class="flex flex-col m-4">
                        <div class="font-semibold ml-2 my-1">{{ $namechat }}</div>
                        <div class="w-auto h-auto bg-blue-600 text-white px-3 py-1 rounded-2xl">
                            <div class="text-left min-w-min">
                                @if ( $chat->body == "bAdmin")
                                you have entered this chat.
                                @else
                                {{ $chat->body  }}
                                @endif
                            </div>
                            <div class="text-xs mt-3">{{ $chat->published }}</div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @else
                You dont have any chat
                @endif
            </div>
        </div>
    </div>
    @if (!empty($list))
    <div class="w-full bottom-0 md:fixed absolute">
        <form class="flex w-full justify-start" wire:submit.prevent="send" autocomplete="off">
            <input type="text"
                class="form-textarea resize-none md:w-6/12 w-10/12 rounded-lg ml-4 md:mr-8 mr-4 my-5 py-1 px-5 bg-white"
                id="journal-scroll" maxlength="255" wire:model="chatBody" placeholder="Write Something" required>
            <button class="bg-blue-300 rounded-lg mx-2 my-5 py-4 md:w-1/12 w-2/12 flex justify-center">Send</button>
        </form>
    </div>
    @endif
</div>