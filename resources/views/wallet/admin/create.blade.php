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
                <form method="POST" action="{{ route('cryptocurrency.store') }}">
                    @csrf

                    <!-- Name Cryptocurrency -->
                    <div>
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Description Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="description" :value="__('Description')" />

                        <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                    </div>

                    <!-- Price Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="price" :value="__('Price')" />

                        <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required/>
                    </div>

                    <!-- Route Image Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="image" :value="__('Image')" />

                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required/>
                    </div>
                    <!-- Vol. Market Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="vol_market" :value="__('Vol. Market')" />

                        <x-input id="vol_market" class="block mt-1 w-full" type="text" name="vol_market" :value="old('vol_market')" required/>
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