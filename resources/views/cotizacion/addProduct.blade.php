<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-12xl">
            {{ __('Añadir producto') }}
        </h2>
    </x-slot>

    <div class="">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto my-4 bg-white rounded overflow-hidden shadow-lg">

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{url('/storeProduct')}}" class="mx-4 px-4 py-4 my-4">
                    @csrf

                    {{ method_field('POST') }}

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-12xl">
                    {{$product->CODIGO}} {{$product->PRODUCTO}}
                    </h2>


                    <div class="mt-3">
                       
                        <input id="id" class="block mt-1 w-full bg-gray-100 rounded border-inherit" value="{{$product->id}}" class="block mt-1 w-full" type="hidden" name="id"  />
                    </div>

                    <div class="mt-3">
                        
                        <input id="producto" class="block mt-1 w-full bg-gray-100 rounded border-inherit" value="{{$product->PRODUCTO}}" class="block mt-1 w-full" type="hidden" name="producto"  />
                    </div>

                    <div class="mt-3">
                        
                        <input id="codigo" class="block mt-1 w-full bg-gray-100 rounded border-inherit" value="{{$product->CODIGO}}" class="block mt-1 w-full" type="hidden" name="codigo"  />
                    </div>

                    <div>
                        <x-jet-label for="cantidad" value="{{ __('Cantidad') }}" />
                        <input id="cantidad" class="block mt-1 w-full rounded border-inherit" value="{{$product->EXISTENCIA}}" class="block mt-1 w-full" type="number" name="cantidad"  required />
                    </div>

                    <div class="mt-3">
                        <x-jet-label for="precio" value="{{ __('Precio') }}" />
                        <input id="precio" class="block mt-1 w-full rounded border-inherit" value="{{$product->PRECIO}}" class="block mt-1 w-full" type="number" step=".01" name="precio" required />
                    </div>








                    <div class="flex items-center justify-end mt-4">


                        <x-jet-button class="ml-4">
                            {{ __('Añadir') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </div>





</x-app-layout>