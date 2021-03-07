<x-app-layout>
    <x-slot name="header">
        <h2 class=" pl-80 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Price Cryptocurrency') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('cryptocurrency.index') }}" class="form-inline" method="GET">
                @csrf
                

                <select name="type" class="form-control mr-sm-2" id="exampleFormControlSelect1">
                    
                    <option value="name">Name</option>
                    <option value="symbol">Symbol</option>
                </select>
                <input type="text" name="data">
                    
                    <button class="bg-yellow-500 rounded ml-2 p-2" type="submit">Buscar</button>
                </form>
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
                            <td><img class="m-10 h-10 content-center" src="../resources/img/cryptocurrencies/{{$crypto->image}}" alt=""></td>
                            <td>#{{$crypto->id}}</td>
                            <td>{{$crypto->name}}</td>
                            <td>{{$crypto->price}} $</td>
                            @if($crypto->percent_change_24h > 0)
                            <td style="color: green;">{{$crypto->percent_change_24h}} %</td>
                            @endif
                            @if($crypto->percent_change_24h < 0.00001)
                            <td style="color: red;">{{$crypto->percent_change_24h}} %</td>
                            @endif

                            
                            @if(!array_search($crypto->name,$cryptos_name))
                            <form action="{{route('follow.new_follow')}}" method="post">
                            @csrf
                            <input type="text" name="cryptocurrency_id" value="{{$crypto->id}}" hidden>
                            <td><button type="submit"><i class="far fa-star"></i></button></td>
                            </form>
                            @else
                            <form method="POST" action="{{ route('follow.delete',$crypto->id)  }}">
                            @csrf
                            @method('DELETE')
                            <td><button type="submit"><i class="far fa-trash-alt"></i></button></td>
                            </form>
                            @endif
                            
                            <td><a class="bg-yellow-500  rounded p-2" href ="{{ route('cryptocurrency.show',$crypto->id) }}" >
                                    {{ __('Detalles') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                    {{$cryptos->appends(request()->all())->links()}}
                </table>

                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>