<x-app-layout>
    <x-slot name="header">
        <h2 class=" pl-80font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cryptocurrency') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <div class="p-10 bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:w-48 p-4" src="/proyectos/exchange/resources/img/cryptocurrencies/{{$crypto->image}}" alt="Man looking at item at a store">
                        </div>
                        
                        <div class="p-1 flex w-70">
                        
                            <div class="flex-1">
                                <div class=" uppercase tracking-wide text-sm text-indigo-500 font-semibold"> {{$crypto->name}} ( {{$crypto->symbol}} )</div>
                                    <p class="mt-2 text-black-500 font-semibold">Price : </p><p class="mt-2 text-gray-500">{{$crypto->price}}</p>
                                    <p class="mt-2 text-black-500 font-semibold">Volume 24h : </p><p class="mt-2 text-gray-500">{{$crypto->volume_24h}}</p>
                                    <p class="mt-2 text-black-500 font-semibold">Market Cap. : </p><p class="mt-2 text-gray-500">{{$crypto->market_cap}}</p>
                                    <p class="mt-2 text-black-500 font-semibold">Date add : </p><p class="mt-2 text-gray-500">{{$crypto->date_added}}</p>
                                </div>
                                
                                <div class="flex-1 w-80 mr-10">
                                <div class=" uppercase tracking-wide text-sm text-indigo-500 font-semibold">Percentage %</div>
                                    <p class="mt-2 text-black-500 font-semibold">Percent. Change 1h : </p>
                                    @if($crypto->percent_change_1h > 0)
                                    <p class="mt-2 text-green-500">{{$crypto->percent_change_1h}} %</p>
                                    @endif
                                    @if($crypto->percent_change_1h < 0)
                                    <p class="mt-2 text-red-500">{{$crypto->percent_change_1h}} %</p>
                                    @endif
                                    
                                    
                                    <p class="mt-2 text-black-500 font-semibold">Percent. Change 24h : </p>
                                    @if($crypto->percent_change_24h > 0)
                                    <p class="mt-2 text-green-500">{{$crypto->percent_change_24h}} %</p>
                                    @endif
                                    @if($crypto->percent_change_24h < 0)
                                    <p class="mt-2 text-red-500">{{$crypto->percent_change_24h}} %</p>
                                    @endif
                                    
                                    </div>
                                <div class="flex-1 mt-5">
                                    
                                    <p class="mt-2 text-black-500 font-semibold">Percent. Change 7d :</p>
                                    @if($crypto->percent_change_7d > 0)
                                    <p class="mt-2 text-green-500">{{$crypto->percent_change_7d}} %</p>
                                    @endif
                                    @if($crypto->percent_change_7d < 0)
                                    <p class="mt-2 text-red-500">{{$crypto->percent_change_7d}} %</p>
                                    @endif
                                    
                                    <p class="mt-2 text-black-500 font-semibold">Percent. Change 30d :  </p>
                                    @if($crypto->percent_change_30d > 0)
                                    <p class="mt-2 text-green-500">{{$crypto->percent_change_30d}} %</p>
                                    @endif
                                    @if($crypto->percent_change_30d < 0)
                                    <p class="mt-2 text-red-500">{{$crypto->percent_change_30d}} %</p>
                                    @endif
                                   
                                </div>
                                
                                
                                
                            </div>

                            
                            
                        </div>
                        <p class="text-xl text-center text-indigo-400 font-extrabold ">Where to buy it?</p>
                        <div class="p-1 flex flex-row justify-evenly" >
                        
                                @foreach ($exchanges as $exchange) 
                            <div class="p-10 bg-white rounded-xl shadow-md flex w-auto ">
                                <div class="md:flex">
                                    <div class="md:flex-shrink-0">
                                        <img class="h-20 w-full object-cover md:w-20 p-2" src="../../../resources/img/exchanges/{{$exchange->image}}" alt="Man looking at item at a store">
                                    </div>
                                    <div class="p-1 w-40 text-center">
                                        <p class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{$exchange->name}}</p>
                                            <a href="{{$exchange->website}}" class=" text-lg leading-tight font-medium text-black hover:underline">Ir a su web</a>
                                            
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                                
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>