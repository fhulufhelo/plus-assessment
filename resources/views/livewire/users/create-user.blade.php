<div>
    <button type="button"  wire:click="$set('createNewUser', true)" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        Create New user
    </button>
   <div>
       <x-dialog-modal maxWidth='3xl' wire:model="createNewUser">
           <form wire:submit.prevent="create">
               <div class="max-w-3xl">
                   <h3 class="text-lg leading-6 font-medium text-white">
                       Create a new User
                   </h3>
                   <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                       <div class="sm:col-span-3">
                           <x-input-label for="first_name" value="First name" />
                           <x-text-input id="first_name" wire:model="state.first_name" class="block mt-1 w-full" type="text" :value="old('first_name')" />
                           <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                       </div>

                       <div class="sm:col-span-3">
                           <x-input-label for="last_name" value="Last name" />
                           <x-text-input id="last_name" wire:model="state.last_name" class="block mt-1 w-full" type="text" :value="old('last_name')" />
                           <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                       </div>

                       <div class="sm:col-span-6">
                           <x-input-label for="email" value="Email address" />
                           <x-text-input id="email" wire:model="state.email"  class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
                           <x-input-error :messages="$errors->get('email')" class="mt-2" />
                       </div>

                       <div class="sm:col-span-6">
                           <fieldset>
                               <legend class="block font-medium text-sm text-white">
                                   Roles
                               </legend>
                               <div class="-space-y-px">
                                   @foreach ($this->roles as $role)
                                       <label class="rounded-tl-md rounded-tr-md relative border p-4 flex cursor-pointer focus:outline-none bg-gray-800 border-gray-700 z-10">
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

                       <div class="sm:col-span-3">
                           <x-input-label for="password" value="Password" />

                           <x-text-input id="password" class="block mt-1 w-full"
                                         wire:model="state.password"
                                         type="password"
                                       />

                           <x-input-error :messages="$errors->get('password')" class="mt-2" />
                       </div>

                       <div class="sm:col-span-3">
                           <x-input-label for="password_confirmation" value="Confirm Password" />

                           <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                         wire:model="state.password_confirmation"
                                         type="password"
                                         name="password_confirmation" />

                           <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                       </div>
                   </div>
                   <div class="flex items-center mt-4">

                       <x-secondary-button type="submit" class="ml-4">
                          Create
                       </x-secondary-button>
                   </div>
               </div>
           </form>
       </x-dialog-modal>
   </div>
</div>
