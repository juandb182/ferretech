<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-12xl">
            {{ __('Actualizar Factor Referencial') }}
        </h2>
    </x-slot>

    <div class="">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto my-4 bg-white rounded overflow-hidden shadow-lg">

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{url('/factor_ref')}}" class="mx-4 px-4 py-4 my-4">
                    @csrf

                    {{ method_field('POST') }}

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-12xl">
                    Factor Referencial
                    </h2>


                    <div class="mt-3">
                        <x-jet-label for="FactorReferencial" value="{{ __('Valor') }}" />
                        <input id="FactorReferencial" class="block mt-1 w-full rounded border-inherit" value="{{$factor[0]->FactorReferencial}}" class="block mt-1 w-full" type="number" step=".01" name="FactorReferencial" required />
                    </div>


                    <div class="flex items-center justify-end mt-4">


                        <x-jet-button class="ml-4">
                            {{ __('Actualizar') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </div>





</x-app-layout>