<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold">List Client : </h2>
                    @foreach ($clients as $client)
                        <div class="p- text-gray-900">
                            <h3 class="text-lg text-gray-900">{{ $client->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $client->id }}</p>
                            <p class="text-sm text-gray-500">{{ $client->redirect }}</p>
                            <p class="text-sm text-gray-500">{{ $client->secret }}</p>
                        </div>
                    @endforeach
                </div>


            </div>
            <div class="mt-3 p-6 bg-white border-b border-gray-200">
                <form action="/oauth/clients" method="POST">
                    <div class="mt-1">
                        <x-label for="name">Name</x-label>
                        <x-input type="text" name="name" placeholder="Client Name"></x-input>
                    </div>
                    <div class="mt-1">
                        <x-label for="redirect">Redirect</x-label>
                        <x-input type="text" name="redirect" placeholder="http://test.com/callback"></x-input>
                    </div>
                    <div class="mt-1">
                        @csrf
                        <x-button type="submit">Create Client</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
