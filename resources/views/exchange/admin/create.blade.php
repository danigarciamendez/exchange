<x-app-layout>
    <x-slot name="header">
        <h2 class=" pl-80 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Exchange') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('exchange.admin.store') }}">
                    @csrf

                    <!-- Name Exchange -->
                    <div>
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus />
                    </div>
                    
                    <!-- Description Exchange -->
                    <div class="mt-4">
                        <x-label for="description" :value="__('Description')" />

                        <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"  />
                    </div>

                    <!-- Website Exchange -->
                    <div class="mt-4">
                        <x-label for="website" :value="__('Website')" />

                        <x-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website')"  />
                    </div>

                    <!-- Cryptocurrency Number Exchange -->
                    <div class="mt-4">
                        <x-label for="crypto_number" :value="__('Crypto Number')" />

                        <x-input id="crypto_number" class="block mt-1 w-full" type="text" name="crypto_number" :value="old('crypto_number')" />
                    </div>

                    <!-- Image Exchange -->
                    <div class="mt-4">
                        <x-label for="image" :value="__('Image')" />

                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" />
                    </div>
                    <!-- Assessment Exchange -->
                    <div class="mt-4">
                        <x-label for="assessment" :value="__('Assessment')" />

                        <x-input id="assessment" class="block mt-1 w-full" type="text" name="assessment" :value="old('assessment')" />
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