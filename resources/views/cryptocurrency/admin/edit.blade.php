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

            
                
                <form method="POST" enctype="multipart/form-data" action="{{ route('cryptocurrency.admin.update',['cryptocurrency' => $cryptocurrency]) }}">
                    @method('PATCH')
                    @csrf

                    <!-- Name Cryptocurrency -->
                    <div>
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $cryptocurrency->name) }}" required autofocus />
                    </div>

                    <!-- Symbol Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="symbol" :value="__('Symbol')" />

                        <x-input id="symbol" class="block mt-1 w-full" type="text" name="symbol" value="{{ old('symbol', $cryptocurrency->symbol) }}" required />
                    </div>

                    


                    <!-- Price Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="price" :value="__('Price')" />

                        <x-input id="price" class="block mt-1 w-full" type="text" name="price" value="{{ old('price', $cryptocurrency->price) }}" required/>
                    </div>

                    
                    <!-- Vol. Market Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="market_cap" :value="__('Market Cap.')" />
                        
                        <x-input id="market_cap" class="block mt-1 w-full" type="text" name="market_cap" value="{{ old('market_cap', $cryptocurrency->market_cap) }}" required/>
                    </div>

                    <!-- Percent. Change 1h Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="percent_change_1h" :value="__(' Percent. Change 1h')" />

                        <x-input id="percent_change_1h" class="block mt-1 w-full" type="text" name="percent_change_1h" value="{{ old('percent_change_1h', $cryptocurrency->percent_change_1h) }}" required/>
                    </div>

                    <!-- Percent. Change 24h Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="percent_change_24h" :value="__(' Percent. Change 24h')" />

                        <x-input id="percent_change_24h" class="block mt-1 w-full" type="text" name="percent_change_24h" value="{{ old('percent_change_24h', $cryptocurrency->percent_change_24h) }}" required/>
                    </div>

                    <!-- Percent. Change 7d Cryptocurrency -->
                    <div class="mt-4">
                        <x-label for="percent_change_7d" :value="__(' Percent. Change 7d')" />

                        <x-input id="percent_change_7d" class="block mt-1 w-full" type="text" name="percent_change_7d" value="{{ old('percent_change_7d', $cryptocurrency->percent_change_7d) }}" required/>
                    </div>

                     <!-- Percent. Change 30d Cryptocurrency -->
                     <div class="mt-4">
                        <x-label for="percent_change_30d" :value="__(' Percent. Change 30d')" />

                        <x-input id="percent_change_30d" class="block mt-1 w-full" type="text" name="percent_change_30d" value="{{ old('percent_change_30d', $cryptocurrency->percent_change_7d) }}" required/>
                    </div>

                   
                    <br>
                        <input type="submit" value="Confirmar" class="bg-yellow-500 rounded ml-2 p-2">
                    </div>
                </form>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>