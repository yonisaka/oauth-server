<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row gap-2">
                <div class="basis-1/2">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="/oauth/clients" method="POST">
                            <div class="mt-1">
                                <x-label for="name">Name</x-label>
                                <x-input type="text" name="name" placeholder="Client Name"></x-input>
                            </div>
                            <div class="mt-1">
                                <x-label for="redirect">Redirect</x-label>
                                <x-input type="text" name="redirect" placeholder="http://test.com/callback">
                                </x-input>
                            </div>
                            <div class="mt-3">
                                @csrf
                                <x-button type="submit">Create Client</x-button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="basis-1/2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @foreach ($clients as $client)
                                <div class="bg-orange-100 rounded-lg mb-3 p-1">
                                    <h3 class="text-sm text-gray-500">Name : {{ $client->name }}</h3>
                                    <p class="text-sm text-gray-500">Client ID : {{ $client->id }}</p>
                                    <p class="text-sm text-gray-500">Secret : {{ $client->secret }}</p>
                                    <p class="text-sm text-gray-500">Callback URL : {{ $client->redirect }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
