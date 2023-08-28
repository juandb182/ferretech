<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="max-w-3xl mx-auto my-4 bg-white rounded overflow-hidden shadow-lg">         

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{url('users/'.$user->id)}}" class="mx-4 px-4 py-4 my-4">
                    @csrf

                    {{ method_field('PATCH') }}
                  
                    <div>
                        <x-jet-label for="name" value="{{ __('Nombre') }}" />
                        <input id="name" class="block mt-1 w-full rounded border-inherit"  value="{{$user->name}}" class="block mt-1 w-full" type="text" name="name"  required />
                    </div>

                    <div class="mt-3">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <input id="email" class="block mt-1 w-full rounded border-inherit"  value="{{$user->email}}" class="block mt-1 w-full" type="email" name="email"  required />
                    </div>

                    <div class="mt-3">
                        <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                        <input id="password" class="block mt-1 w-full rounded border-inherit" type="password" name="password" autocomplete="new-password"    />

                        
                        
                    </div>

                    <div class="mt-3">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                        <!-- <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"  autocomplete="new-password" /> -->
                        <input id="password_confirmation" class="block mt-1 w-full rounded border-inherit"   type="password"  name="password_confirmation" autocomplete="new-password"    />
                    </div>

                    <div class="mt-3">

                        <x-jet-label for="userType" value="{{ __('Tipo De Usuario') }}" />
                        <select id="userType" class="block mt-1 w-full border-inherit rounded" name="userType">

                            <option value="0">
                                Usuario 
                            </option>
                            <option value="1">
                                Admin
                            </option>
                            <option value="2">
                                Gerencia 
                            </option>
                            <option value="3">
                                Costos
                            </option>
                            <option value="4">
                                Consultor
                            </option>

                    </div>

                    </select>

               

                    <div class="flex items-center justify-end mt-4">
                        

                        <x-jet-button class="ml-4">
                            {{ __('Editar Usuario') }}
                        </x-jet-button>
                    </div>
                </form>
         
        </div>
        </div>
    </div>






</x-app-layout>