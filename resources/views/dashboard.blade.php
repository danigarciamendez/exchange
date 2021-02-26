<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                @if(!empty($cryptos))
                
                <table class="table-fixed border">
                    <thead>
                        <tr>
                            <th class="w-1/10"></th>
                            <th class="w-1/6">Ranking</th>
                            <th class="w-1/6">Name</th>
                            <th class="w-1/6">Price</th>
                            <th class="w-1/6">24h Variation</th>
                            
                            <th class="w-1/4"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($cryptos as $crypto)
                             
                        <tr>
                            <!--  -->
                            <td><img class="m-10 h-10 content-center" src="../resources/img/cryptocurrencies/{{$crypto->image}}" alt=""></td>
                            <td>#{{$crypto->id}}</td>
                            <td>{{$crypto->name}}</td>
                            <td>{{$crypto->price}} $</td>
                            @if($crypto->percent_change_24h > 0)
                            <td style="color: green;">{{$crypto->percent_change_24h}} %</td>
                            @endif
                            @if($crypto->percent_change_24h < 0)
                            <td style="color: red;">{{$crypto->percent_change_24h}} %</td>
                            @endif


                            
                            <td><a class="bg-yellow-500  rounded p-2" href ="{{ route('cryptocurrency.show',$crypto->id) }}" >
                                    {{ __('Detalles') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                    
                </table>
                @else
                <div class="text-center">
                    <h1 class="bg-yellow-100">Follow some cryptocurrency!</h1>
                </div>
                @endif
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
