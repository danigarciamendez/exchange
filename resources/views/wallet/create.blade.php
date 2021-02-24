<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Wallet') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('exchange.store') }}">
                    @csrf

                    <!-- ID User -->
                    <div>
                        <x-label for="user_id" :value="__('ID User')" />

                        <x-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" :value="old('user_id')" required autofocus />
                    </div>

                    <!-- ID Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="cryptocurrency_id" :value="__('ID Cryptocurrency')" />

                        <x-input id="cryptocurrency_id" class="block mt-1 w-full" type="text" name="cryptocurrency_id" :value="old('cryptocurrency_id')" required />
                    </div>

                    <!-- Quantity -->
                    <div class="mt-4">
                        <x-label for="quantity" :value="__('Quantity')" />

                        <x-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')" required/>
                    </div>

                    

                   

                        <x-button class="ml-4" >
                            {{ __('Añadir') }}
                        </x-button>
                    </div>
                </form>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>