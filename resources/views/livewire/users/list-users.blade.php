<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                <div class="max-w-md">
                    <form>
                        <div class="flex">
                            <div class="relative w-full">
                                <input wire:model="search" type="search" class="block p-2.5 w-full z-20 text-sm text-white bg-placeholder-gray border border-secondary focus:ring-blue-500 focus:border-secondary dark:bg-gray-700" placeholder="Search">
                                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-placeholder-gray  hover:bg-bar-gray focus:ring-4 focus:outline-none focus:ring-bar-gray">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="mt-2 shadow overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-bar-gray">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white tracking-wider">
                                First name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white tracking-wider">
                                Last name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white tracking-wider">
                                Email address
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white tracking-wider">
                                Member Since
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-placeholder-gray divide-y divide-y-4 divide-secondary">
                        @forelse ($this->users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-link underline">
                                    <button wire:click="edit({{$user->id}})" class="underline">
                                        {{$user->first_name}}
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                    {{$user->last_name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                    {{$user->email}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                    {{$user->roles->implode('name', ', ')}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                    {{ date('j F Y', strtotime($user->created_at)) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-yellow-500 underline">
                                    No users
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                   <div class="mt-4">
                       {{ $this->users->links('vendor.livewire.tailwind') }}
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
