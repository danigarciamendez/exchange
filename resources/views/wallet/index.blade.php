<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Wallet') }}
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
                            <th class="w-1/6">Name</th>
                            <th class="w-1/6">Price</th>
                            <th class="w-1/6">Quantity</th>
                            <th class="w-1/8">Amount</th>
                            <th class="w-1/4"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($wallets as $wallet)
                        
                        <tr>
                            <td><img class="m-10 h-10 content-center" src="/proyectos/exchange/{{$wallet->cryptos->image}}" alt=""></td>
                            <td>{{$wallet->cryptos->name}}</td>
                            <td>{{$wallet->cryptos->price}}</td>
                            <td>{{$wallet->quantity}}</td>
                            <td>{{$wallet->quantity*$wallet->cryptos->price}} €</td>
                            <td><button style="background-color:aqua;padding:5%; border-radius: 20%;">Vender</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>