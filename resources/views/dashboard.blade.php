<x-app-layout>
    <div class="px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <h1 class="text-lg font-medium leading-6 text-white">
                Users
            </h1>
            <div class="mt-4">
                @livewire('users.create-user')
            </div>
        </div>
        <div class="mt-8">
            @livewire('users.list-users')
            @livewire('users.edit-user')
        </div>
    </div>
</x-app-layout>
