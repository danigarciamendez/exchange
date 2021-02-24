<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Cryptocurrency') }}
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
                            <th class="w-1/6">Symbol</th>
                            <th class="w-1/6">Price</th>
                            <th class="w-1/6">24h Variation</th>
                            <th class="w-1/8"></th>
                            <th class="w-1/4"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($cryptos as $crypto)
                             
                        <tr>
                            <td><img class="m-10 h-10 content-center" src="/proyectos/exchange/{{$crypto->image}}" alt=""></td>
                            <td>#{{$crypto->id}}</td>
                            <td>{{$crypto->name}}</td>
                            <td>{{$crypto->symbol}}</td>
                            <td>{{$crypto->price}}</td>
                            <td style="color: green;"><i style="color:green;" class="fas fa-chevron-up"></i> 2,4%</td>
                            <td><a class="bg-yellow-500  rounded p-2" href ="{{ route('cryptocurrency.admin.edit',$crypto->id) }}" >
                                    {{ __('Editar') }}
                                </a>
                            </td>
                            <td><a class="bg-yellow-500 rounded p-2" href ="{{ route('cryptocurrency.admin.destroy',$crypto) }}" >
                                    {{ __('Eliminar') }}
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