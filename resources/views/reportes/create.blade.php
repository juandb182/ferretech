<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-12xl">
            {{ __('Crear Reporte') }}
        </h2>
    </x-slot>

    <div class="">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto my-4 bg-white rounded overflow-hidden shadow-lg">

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ url('/reportes') }}" class="mx-4 px-4 py-4 my-4">
                

              @csrf

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-12xl">
                    Crear Reporte
                    </h2>


                    <div class="mt-3">
                        <x-jet-label for="name" value="{{ __('Nombre') }}" />
                        <input id="name" name="name" type="text" class="block mt-1 p-2 border border-black w-full rounded border-inherit" required />
                    </div>

                    <div class="mt-3">
                        <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                        <input id="descripcion" name="descripcion" class="block mt-1 p-2 border border-black w-full rounded border-inherit" required />
                    </div>


                    <div class="flex items-center justify-end mt-4">


                        <x-jet-button class="ml-4">
                            {{ __('Crear') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </div>





</x-app-layout>