<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Exchanges') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('exchange.admin.index') }}" class="form-inline" method="GET">
                @csrf
                    <select name="type" class="form-control mr-sm-2" id="exampleFormControlSelect1">
                        <option value="name">Name</option>
                        <option value="assessment">Assessment</option>
                    </select>
                    <input type="text" name="data">
                    
                    <button class="bg-yellow-500 rounded ml-2 p-2" type="submit">Search</button>
                    <a class="bg-yellow-500  rounded p-2 text-right" href ="{{ route('exchange.admin.create') }}" >
                                    {{ __('New Exchange') }}
                    </a>
                </form>
                <table class="table-fixed border">
                    <thead>
                        <tr>
                            <th class="w-1/8"></th>
                            <th class="w-1/6">Name</th>
                            <th class="w-1/6">Cryptocurrency Number</th>
                            <th class="w-1/8">Assessment</th>
                            <th class="w-1/8">Website</th>
                            <th class="w-1/8"></th>
                            <th class="w-1/8"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($exchanges as $exchange)
                             
                        <tr>
                            <td><img class="m-10 h-10 content-center" src="../../resources/img/exchanges/{{$exchange->image}}" alt=""></td>
                            <td>{{$exchange->name}}</td>
                            <td>+ {{$exchange->crypto_number}}</td>
                            <td>{{$exchange->assessment}}</td>
                            <td><a href="{{$exchange->website}}">Ir a enlace</a></td>
                            <form action="" method="get" >
                            <td><a class="bg-yellow-500  rounded p-2" href ="{{ route('exchange.admin.edit',$exchange) }}" >
                                    {{ __('Editar') }}
                                </a>
                            </td>
                            <td><a class="bg-yellow-500  rounded p-2" href ="{{ route('exchange.admin.destroy',$exchange->id) }}" >
                                    {{ __('Eliminar') }}
                                </a>
                            </td>
                            </form>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>