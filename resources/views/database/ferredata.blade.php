<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion de DB') }}
        </h2>
    </x-slot>

    <div class="">

        @if(Session::has("success1"))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{session("success1")}}</p>

        </div>
        @endif

        @if(Session::has("success3"))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{session("success3")}}</p>
        </div>
        @endif

        @if(Session::has("successAll"))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{session("successAll")}}</p>

        </div>
        @endif


        @if(Session::has("danger"))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p class="font-bold">Error</p>
            <p>{{session("danger")}}</p>

        </div>
        @endif

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">


            <div class="max-w-5xl mx-auto my-4 bg-white rounded overflow-hidden shadow-md">



                <form method="POST" action="{{ url('/db') }}" enctype="multipart/form-data" class="mx-4 px-4 py-4 my-4">
                    @csrf
                    <div>
                        <x-jet-label class="mb-2" for="fv1Upload" value="{{ __('Cargar Fv1') }}" />
                        <div class="flex justify-center">
                            <div class="mb-3 w-full flex">

                                <input name="fv1Upload" id="fv1Upload" class="form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                file:p-2
                                file:mx-2
                        
                                file:shadow-sm
                                file:bg-transparent
                               
                                file:border-gray-300
                            
                                
                                file:text-gray-700
                                file:uppercase
                                file:rounded
                                file:border
                                file:border-solid
                                file:border-gray-300
                                file:font-semibold
                                file:text-xs





                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile"  autofocus autocomplete="name">
                              
                            </div>
                        </div>

                        <x-jet-label class="mb-2" for="fv3Upload" value="{{ __('Cargar Fv3') }}" />

                        <div class="flex justify-center">
                            <div class="mb-3 w-full flex">
                                <input name="fv3Upload" id="fv3Upload" class="form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                file:p-2
                                file:mx-2
                        
                                file:shadow-sm
                                file:bg-transparent
                               
                                file:border-gray-300
                            
                                
                                file:text-gray-700
                                file:uppercase
                                file:rounded
                                file:border
                                file:border-solid
                                file:border-gray-300
                                file:font-semibold
                                file:text-xs
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile"  autofocus autocomplete="name">
                               
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Subir Archivos') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>



        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="max-w-5xl mx-auto my-4 bg-white rounded overflow-hidden shadow-lg">







                <div class="overflow-auto rounded-lg shadow">
                    <table class="w-full mx-auto shadow-xl ">
                        <thead class="bg-white-50">
                            <tr class="border-b border-gray-600">
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">ACCION 🛠️</td>
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">DESCRIPCION 📓</td>
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">ELIMINAR ❌</td>
                            </tr>


                            <form method="GET" action="{{url('/deleteFv1')}}" class="mx-4 px-4 py-4 my-4">
                                @csrf

                                <tr class=" border-b ">
                                    <td class="p-3 text-sm font-bold text-gray-900 text-center ">Eliminar fv1</td>
                                    <td class="p-3 text-sm font-semibold text-gray-900 text-center">Esta accion limpia los registros de la tabla ferre1 de la base de datos.</td>
                                    <td class="p-3 text-sm font-bold text-gray-900 text-center">
                                        <x-jet-danger-button class="ml-4" onclick="return confirm('Esta seguro de realizar esta accion?');" type="submit">
                                            {{ __('Borrar') }}
                                        </x-jet-danger-button>
                                    </td>
                                    </td>


                                </tr>
                            </form>
                            <form method="GET" action="{{url('/deleteFv3')}}" class="mx-4 px-4 py-4 my-4">
                                @csrf
                                <tr class=" border-b ">
                                    <td class="p-3 text-sm font-bold text-gray-900 text-center">Eliminar fv3</td>
                                    <td class="p-3 text-sm font-semibold text-gray-900 text-center">Esta accion limpia los registros de la tabla ferre3 de la base de datos.</td>
                                    <td class="p-3 text-sm font-bold text-gray-900 text-center">
                                        <x-jet-danger-button class="ml-4" onclick="return confirm('Esta seguro de realizar esta accion?');" type="submit">
                                            {{ __('Borrar') }}
                                        </x-jet-danger-button>
                                    </td>
                                    </td>
                                </tr>
                            </form>
                            <form method="GET" action="{{url('/deleteAll')}}" class="mx-4 px-4 py-4 my-4">
                                @csrf
                                <tr class=" border-b ">
                                    <td class="p-3 text-sm font-bold text-gray-900 text-center">Eliminar Todos</td>
                                    <td class="p-3 text-sm font-semibold text-gray-900 text-center">Esta accion limpia los registros de todas las tablas ferre1 y ferre3 de la base de datos.</td>
                                    <td class="p-3 text-sm font-bold text-gray-900 text-center">
                                        <x-jet-danger-button class="ml-4" onclick="return confirm('Esta seguro de realizar esta accion?');" type="submit">
                                            {{ __('Borrar') }}
                                        </x-jet-danger-button>
                                    </td>
                                    </td>
                                </tr>
                            </form>

                        </thead>
                    </table>
                </div>

            </div>
        </div>

    </div>







</x-app-layout>