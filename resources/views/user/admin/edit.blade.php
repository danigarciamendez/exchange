<x-app-layout>
   <x-slot name="header">
       <h2 class=" pl-80 font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Edit User') }}
       </h2>
   </x-slot>

   <div class="py-6"> 
       <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 bg-white border-b border-gray-200">    
                   
               <x-auth-validation-errors class="mb-4" :errors="$errors" />
              
                     <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                         @csrf
                         <x-input id="name" class="block mt-1 w-full"  type="hidden" name="id" :value="$user->id" autofocus />
                         <!-- Name -->
                         <div>
                             <x-label for="name" :value="__('Name')" />
              
                             <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name"  autofocus />
                         </div>
              
                         <!-- Surname -->
                         <div class="mt-4">
                            <x-label for="surname" :value="__('Surname')" />
              
                            <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="$user->surname "  />
                         </div>
              
                         <!-- Nick -->
                         <div class="mt-4">
                            <x-label for="account_type" :value="__('Rol')" />
              
                            <x-input id="account_type" class="block mt-1 w-full" type="text"  readonly :value="$user->account_type"  />
                         </div>
              
                         <!-- Email Address -->
                         <div class="mt-4">
                             <x-label for="email" :value="__('Email')" />
              
                             <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email"  />
                         </div>
              
                         <!-- Imagen de usuario -->
                         <div class="mt-4">
                           <x-label for="image" :value="__('Imagen')" />
                            
                           <x-input id="image" class="mt-1" type="file" name="image" :value="$user->image"  />
                            @if(is_null($user->image))
                            
                                <img alt="Photo of profile" class="shadow rounded border-none w-20 mt-2 ml-40" src="/proyectos/exchange/resources/img/user.png">
                            @else 
                                    <img alt="Photo of profile" style="width: 100px;height: 100px;" class="shadow rounded align-middle border-none ml-40" src="{{ route('user.avatar',$user->image)}}">
                            @endif
                           
                           <div class="flex flex-wrap justify-center mt-2">
                              <div class="w-6/12 sm:w-4/12 px-4">
                                
                              </div>
                           </div>
                         </div>

                         <!-- Password -->
                         <div class="mt-4">
                             <x-label for="password" :value="__('Password')" />
              
                             <x-input id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             required autocomplete="new-password" />
                         </div>
              
                         <!-- Confirm Password -->
                         <div class="mt-4">
                             <x-label for="password_confirmation" :value="__('Confirm Password')" />
              
                             <x-input id="password_confirmation" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation" required />
                         </div>
                        <!-- Is Admin -->
                        <div class="mt-4">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="account_type" value="admin">
                                <span class="ml-2">Admin</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio" name="account_type" value="user">
                                <span class="ml-2">User</span>
                            </label>
                        </div>
                         <div class="flex items-center justify-end mt-4">
              
                             <x-button class="ml-4">
                                 {{ __('Guardar cambios') }}
                             </x-button>
                         </div>
                     </form>              
               </div>
           </div>
       </div>
   </div>
</x-app-layout>