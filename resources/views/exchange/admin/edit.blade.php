<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Cryptocurrency') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ url('exchange/admin/{$exchange->id}') }}">
                    {{ method_field('PUT') }}
                    @csrf

                    <!-- Name Cryptocurrency -->
                    <div>
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $exchange->name) }}" required autofocus />
                    </div>

                    <!-- Description Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="website" :value="__('Website')" />

                        <x-input id="website" class="block mt-1 w-full" type="text" name="website" value="{{ old('website', $exchange->website) }}" required />
                    </div>

                    <!-- Price Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="crypto_number" :value="__('Crypto Number')" />

                        <x-input id="crypto_number" class="block mt-1 w-full" type="text" name="crypto_number" value="{{ old('crypto_number', $cryptocurrency->crypto_number) }}" required/>
                    </div>

                    <!-- Route Image Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="image" :value="__('Image')" />

                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" value="{{ old('image', $cryptocurrency->image) }}" required/>
                    </div>
                    <!-- Vol. Market Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="assessment" :value="__('Assessment')" />

                        <x-input id="assessment" class="block mt-1 w-full" type="text" name="assessment" value="{{ old('assessment', $cryptocurrency->assessment) }}" required/>
                    </div>

                   

                        <x-button class="ml-4" >
                            {{ __('Confirmar') }}
                        </x-button>
                    </div>
                </form>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>