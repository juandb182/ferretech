<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comparacion de Sedes') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="flex pt-5 mx-auto max-w-7xl">
            <form action="{{ url('/searchGeneral') }}" type="get" method="get" class="w-full flex ">
                <input type="search" value="" name="query" placeholder="Introducir el codigo para la busqueda" class="w-full border-gray  mx-2 rounded-lg bg-white px-4 py-2 text-gray-900">
                <div class="inline-block relative">
                   
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

                    </div>
                </div>
                <button class="rounded mx-2 bg-slate-700 px-4 py-2 text-white transition  hover:bg-slate-500 duration-300" type="submit">Buscar</button>

            </form>
        </div>

      

                <div class="overflow-auto max-w-7xl mx-auto flex gap-10 pt-5 rounded-lg ">
                    <table class="w-full mx-auto shadow-xl ">
                        <thead class="bg-gray-50">
                            <tr class="border-b border-gray-600">
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">TDA 🏙️</td>
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">COD #️⃣</td>
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">PRODUCTO 🏭</td>
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">PRECIO 💲</td>
                                
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">EXISTENCIA 🗳️</td>
                                @if($user->userType == 1 || $user->userType == 2 || $user->userType == 3 )
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">COSTO 💲 ️</td>
                                @endif
                                
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">UBICACION️</td>

                            </tr>



                            @if ($products == null)
                        




                            @else




                            @foreach($products as $product)
                            <tr class=" border-b hover:bg-gray-200 duration-300">
                                <td class="p-3 text-sm font-bold text-gray-900 text-center ">
                                    
                                    @if($product->tabla == "ferre1s")
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400 inline-flex items-center justify-center">  Los Caobos</span>

                                    @else

                                  <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400 inline-flex items-center justify-center"> Mañongo</span>

                                    
                                  @endif
                                    
                        </td>
                                <td class="p-3 text-xs font-bold text-gray-900 text-center">
                          <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">  {{$product->CODIGO}}</span>
                        
                        </td>
                                <td class="p-3 text-sm font-semibold text-gray-900">{{$product->PRODUCTO}} </td>
                                <td class="p-3 text-sm font-bold text-green-900 text-center">{{round($product->PRECIO,2) ." "."$"}}</td>
                                
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$product->EXISTENCIA}}</td>
                                @if($user->userType == 1 || $user->userType == 2 || $user->userType == 3 )
                                <td class="p-3 text-sm font-bold text-gray-900 text-center">{{round($product->COSTO,2) ." "."$"}}</td>
                                @endif


                                <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$product->UBICACION}}</td>

                            </tr>
                            @endforeach



                            @endif






                        </thead>
                    </table>
                </div>





       

    </div>

</x-app-layout>