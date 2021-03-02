<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Create User') }}
       </h2>
   </x-slot>

   <div class="py-6"> 
       <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 bg-white border-b border-gray-200">    
                   
              
                     <form method="POST" action="{{ route('user.admin.store') }}" enctype="multipart/form-data">
                         @csrf
              
                         <!-- Name -->
                         <div>
                             <x-label for="name" :value="__('Name')" />
              
                             <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                         </div>
              
                         <!-- Surname -->
                         <div class="mt-4">
                            <x-label for="surname" :value="__('Surname')" />
              
                            <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required />
                         </div>
              
              
                         <!-- Email Address -->
                         <div class="mt-4">
                             <x-label for="email" :value="__('Email')" />
              
                             <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('name')" required />
                         </div>
              
                         <!-- Imagen de usuario -->
                         <div class="mt-4">
                           <x-label for="image" :value="__('Imagen')" />
                            
                           <x-input id="image" class="mt-1" type="file" name="image" :value="old('image')" required />
                           
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