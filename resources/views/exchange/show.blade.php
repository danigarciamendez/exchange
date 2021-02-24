<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exchange') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <div class="p-10 bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:w-48 p-2" src="/proyectos/exchange/resources/img/exchanges/{{$exchange->image}}" alt="Man looking at item at a store">
                        </div>
                        <div class="p-1">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{$exchange->name}}</div>
                                <a href="{{$exchange->website}}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Ir a su web</a>
                                <p class="mt-2 text-gray-500">{{$exchange->description}}</p>
                            </div>
                        </div>
                    </div>
                <!-- <div>

                    <p>Nombre : {{$exchange->name}}</p>
                    <p>{{$exchange->website}}</p>
                </div> -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>