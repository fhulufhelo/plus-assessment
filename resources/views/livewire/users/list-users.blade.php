<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-900">
                    <table class="min-w-full divide-y divide-gray-900">
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
                        <tbody class="bg-placeholder-gray divide-y divide-y-2 divide-gray-900">
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
                </div>
            </div>
        </div>
    </div>
</div>
