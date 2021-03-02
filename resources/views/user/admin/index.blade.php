<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Users') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('user.admin.index') }}" class="form-inline" method="GET">
                @csrf
                    <select name="type" class="form-control mr-sm-2" id="exampleFormControlSelect1">
                        <option value="name">Name</option>
                        <option value="email">Email</option>
                    </select>
                    <input type="text" name="data">
                    
                    <button class="bg-yellow-500 rounded ml-2 p-2" type="submit">Search</button>
                    <a class="bg-yellow-500  rounded p-2 text-right" href ="{{ route('user.admin.create') }}" >
                                    {{ __('New User') }}
                    </a>
                </form>
                <br>
                <table class="table-fixed border ">
                    <thead>
                        <tr>
                            <th class="w-1/8 p-2">Image</th>
                            <th class="w-1/6">Name</th>
                            <th class="w-1/6">Surname</th>
                            <th class="w-1/6">Email</th>
                            <th class="w-1/6">Role</th>

                            <th class="w-1/8"></th>
                            <th class="w-1/8"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center p-2">
                    @foreach ($users as $user)
                             
                        <tr>
                             <td>
                            @if(is_null($user->image))
                                
                            <img alt="Photo of profile" class="shadow rounded border-none w-20 mt-2 ml-6" src="/proyectos/exchange/resources/img/user.png">
                            @else 
                            <img alt="Photo of profile" style="width: 80px;height: 80px;" class="shadow rounded align-middle border-none ml-6" src="{{ route('user.avatar',$user->image)}}">
                            @endif
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->account_type}} </td>
                            
                            <td><a class="bg-yellow-500  rounded p-2" href ="{{ route('user.admin.edit',$user->id) }}" >
                                    {{ __('Edit') }}
                                </a>
                            </td>
                            <form method="POST" action="{{ route('user.admin.destroy',$user->id)  }}">
                            @csrf
                            @method('DELETE')
                            
                            
                            <td><button type="submit" class="bg-yellow-500 rounded p-2" >
                                    {{ __('Delete') }}
                                </a>
                            </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                    {{$users->appends(request()->all())->links()}}
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>