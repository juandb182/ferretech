<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>

                    </div>

                    <div class="mt-2 text-2xl">
                        <p class="text-4xl font-bold text-gray-900 dark:text-white">FERRE-VENTE C.A</p>

                    </div>


                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <img src="{{asset('img/tuerca.png')}}" class="block h-9 w-auto" />
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Los Caobos</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500 ">
                                <div class="mt-2 text-sm text-gray-500 mb-2">
                                Consulta de precios y existencia de productos en sucursal Los Caobos.
                                </div>
                                <a href="{{ url('/fv1') }}">


                                    <button type="button" class="w-full text-center text-blue-700 transition font-semibold duration-300 hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Consultar</button>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <img src="{{asset('img/tornillo.png')}}" class="block h-9 w-auto" />
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Mañongo</div>
                        </div>

                        <div class="ml-12">

                            <div class="mt-2 text-sm text-gray-500 ">
                                <div class="mt-2 text-sm text-gray-500 mb-2">
                                Consulta de precios y existencia de productos en sucursal Mañongo.
                                </div>
                                <a href="{{ url('/fv3') }}">


                                    <button type="button" class="w-full text-center text-blue-700 transition font-semibold duration-300 hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Consultar</button>
                                </a>
                            </div>


                        </div>
                    </div>

                    @if( Auth::user()->userType == "2")

                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <img src="{{asset('img/comparar.png')}}" class="block h-9 w-auto" />
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Consulta General</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500 mb-2">
                            Consulta de precios y existencia de productos en todas la sucursales.
                            </div>

                            <a href="{{ url('/general') }}">


                                <button type="button" class="w-full text-center text-blue-700 transition font-semibold duration-300 hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Consultar</button>
                            </a>
                        </div>
                    </div>

                    @else

                    <div class="p-6 border-t border-gray-200 md:border-l">
                        <div class="flex items-center">
                            <img src="{{asset('img/en-construccion.png')}}" class="block h-9 w-auto" />

                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Proximamente....</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500 mb-2">
                                Proximamente...
                            </div>

                            <button type="button" class="w-full text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>Consultar</button>
                        </div>
                    </div>

                    @endif



                    <div class="p-6 border-t border-gray-200 md:border-l">
                        <div class="flex items-center">
                            <img src="{{asset('img/en-construccion.png')}}" class="block h-9 w-auto" />

                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Proximamente....</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500 mb-2">
                                Proximamente...
                            </div>

                            <button type="button" class="w-full text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>Consultar</button>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>