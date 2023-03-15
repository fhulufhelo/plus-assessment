<div>
    <div class="py-12">
        <!-- Update User Modal -->
        <x-dialog-modal maxWidth='3xl' wire:model="updateNewUser">
            <form wire:submit.prevent="update">
                <div class="w-full">
                    <h3 class="text-lg leading-6 font-medium text-white">
                        Update a User
                    </h3>

                    <!-- Form Fields -->
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <!-- First Name -->
                        <div class="sm:col-span-3">
                            <x-input-label for="first_name" value="First name" />
                            <x-text-input id="first_name" wire:model="state.first_name" class="block mt-1 w-full" type="text" :value="old('first_name')" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div class="sm:col-span-3">
                            <x-input-label for="last_name" value="Last name" />
                            <x-text-input id="last_name" wire:model="state.last_name" class="block mt-1 w-full" type="text" :value="old('last_name')" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="sm:col-span-6">
                            <x-input-label for="email" value="Email address" />
                            <x-text-input id="email" wire:model="state.email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Roles -->
                        <div class="sm:col-span-6">
                            <fieldset>
                                <legend class="block font-medium text-sm text-white">
                                    Roles
                                </legend>
                                <div class="mt-2">
                                    @foreach ($this->roles as $role)
                                        <label class="rounded-tl-md mt-1 rounded-tr-md relative border p-4 flex cursor-pointer focus:outline-none bg-placeholder-gray border-placeholder-gray z-10">
                                            <input type="checkbox"
                                                   wire:model="state.roles"
                                                   value="{{$role->id}}" class="h-4 w-4 mt-0.5 cursor-pointer text-gray-600 border-gray-800 focus:ring-gray-500">
                                            <div class="ml-3 flex flex-col">
                                                <span id="privacy-setting-0-label" class="block text-sm font-medium text-white">
                                                    {{$role->name}}
                                                </span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center mt-4">
                        <button type="submit"
                                class="text-link hover:text-bar-gray border border-link hover:bg-link focus:ring-4 focus:outline-none focus:ring-link font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Apply changes
                        </button>
                    </div>
                </div>
            </form>
        </x-dialog-modal>
    </div>
</div>
