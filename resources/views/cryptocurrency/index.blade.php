<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Price Cryptocurrency') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <table class="table-fixed border">
                    <thead>
                        <tr>
                            <th class="w-1/10"></th>
                            <th class="w-1/6">Ranking</th>
                            <th class="w-1/6">Name</th>
                            <th class="w-1/6">Price</th>
                            <th class="w-1/6">24h Variation</th>
                            <th class="w-1/8">Favorite</th>
                            <th class="w-1/4"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($cryptos as $crypto)
                             
                        <tr>
                            <td><img class="m-10 h-10 content-center" src="/proyectos/exchange/{{$crypto->image}}" alt=""></td>
                            <td>#{{$crypto->id}}</td>
                            <td>{{$crypto->name}}</td>
                            <td>{{$crypto->price}}</td>
                            <td style="color: green;"><i style="color:green;" class="fas fa-chevron-up"></i> 2,4%</td>
                            <td><i class="far fa-star"></i></td>
                            <td><button style="background-color:aqua;padding:5%; border-radius: 20%;">Detalles</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>