<div>
    @section('title', 'Setting')
    <div>
        <div class="mx-auto w-full max-w-2xl mx-2 mb-10">
            <div class="p-5 bg-white shadow rounded-lg sm:px-5 shadow-md mx-4">
                <div class="w-full text-center text-2xl border-b-2 pb-4 mb-2">
                    Update Your Profile
                </div>
                <div class="block md:flex">
                    <div class="md:w-1/4 w-full justify-center flex mb-5">
                        <img class="w-40 h-40 rounded object-center object-cover"
                            src="{{ auth()->user()->gravatar() }}">
                    </div>
                    <div class="md:w-3/4 md:ml-10 w-full">
                        <form>
                            <div>
                                @if (session()->has('message'))
                                <div class="bg-green-100 border-l-4 border-green-400 py-2 mb-2 px-1">
                                    {{ session('message') }}
                                </div>
                                @endif
                            </div>
                            <div class="mb-5 w-full">
                                <label for="username" class="block font-medium mb-1">Username</label>
                                <input type="text" class="w-full block border-gray-300 rounded" id="username"
                                    placeholder="Enter Your Username.." wire:model="username">
                                @error('username')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5 w-full">
                                <label for="name" class="block font-medium mb-1">Name</label>
                                <input type="text" class="w-full block border-gray-300 rounded" id="name"
                                    placeholder="Enter Your Name.." wire:model="name">
                                @error('name')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5 w-full">
                                <label for="picture" class="block font-medium mb-1">Profile Picture</label>
                                <input type="file" class="w-full block border-gray-300 rounded" id="picture"
                                    wire:model="picture">
                                @error('picture')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="button"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring-blue active:bg-blue-700 transition duration-150 ease-in-out" wire:click="update()">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

