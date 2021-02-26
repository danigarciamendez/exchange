<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Top Exchanges') }}
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
                            <th class="w-1/6">Cryptocurrency Number</th>
                            <th class="w-1/8">Assessment</th>
                            <th class="w-1/8">Website</th>
                            <th class="w-1/4"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($exchanges as $exchange)
                             
                        <tr>
                            <td><img class="pl-8 pt-2 mb-2 w-30 h-20 " src="../resources/img/exchanges/{{$exchange->image}}" alt=""></td>
                            <td>{{$exchange->name}}</td>
                            <td>+ {{$exchange->crypto_number}}</td>
                            <td>{{$exchange->assessment}}</td>
                            <td><a href="{{$exchange->website}}">Go to</a></td>
                            
                            <td>
                                <a class="bg-yellow-500 rounded p-3" href="{{ route('exchange.show',$exchange) }}">
                                {{ __('Detalles') }}
                                </a>
                            </td>
                            
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>