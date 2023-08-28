<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-12xl">
            {{ __('Sede Los Caobos') }}
        </h2>
    </x-slot>

   
        <div class="flex pt-5 mx-auto max-w-7xl">
            <form action="{{ url('/searchfv1') }}" type="get" method="get" class="w-full flex ">
                <input type="search"  value="{{ old('query') ?: session('last_search') }}" id="mysearch" name="query" placeholder="Realizar busqueda" class="w-full border-gray  mr-2 rounded-lg bg-white px-4 py-2 text-gray-900">
                <div class="inline-block relative ">
                    <select name="order" class=" rounded bg-slate-700 px-2 py-2 text-white transition  hover:bg-slate-500 duration-300">
                        <option>Existencia</option>
                        <option value="ASC">Ascendente</option>
                        <option value="DESC">Descendente</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                       
                    </div>
                </div>
                <button class="rounded mx-2 bg-slate-700 px-4 py-2 text-white transition  hover:bg-slate-500 duration-300" type="submit">Buscar</button>

            </form>
        </div>






        <div class="overflow-auto max-w-7xl mx-auto flex gap-10 pt-5 rounded-lg ">
            <table class=" w-full mx-auto shadow-xl rounded-xl ">
                <thead class="bg-gray-50">
                    <tr class="border-b border-gray-600">
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">CODIGO #️⃣</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">PRODUCTOS 🏭</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">PRECIO 💲</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">EXISTENCIA 🗳️</td>
                        @if($user->userType == 1 || $user->userType == 2 || $user->userType == 3 )
                         <td class="p-3 text-sm font-bold text-gray-900 text-center">COSTO 💲</td>
                        @endif
                        
                        @if($user->userType == 1 || $user->userType == 2 || $user->userType == 3 || $user->userType == 0 || $user->userType == 4)
                         <td class="p-3 text-sm font-bold text-gray-900 text-center">UBICACION 🏗️</td>
                        @endif
                        
                    </tr>

                  

                    @foreach($products as $product)
                    <tr class=" border-b hover:bg-gray-200 duration-300">
                    <td class="p-3 text-xs font-bold text-gray-900 text-center">
                          <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">  {{$product->CODIGO}}</span>
                        
                        </td>
                        <td class="p-3 text-sm font-semibold text-gray-900">{{$product->PRODUCTO}} </td>
                        <td class="p-3 text-sm font-bold text-emerald-700 text-center">{{round($product->PRECIO,2) ." "."$"}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$product->EXISTENCIA}}</td>
                        @if($user->userType == 1 || $user->userType == 2 || $user->userType == 3 )
                         <td class="p-3 text-sm font-bold text-gray-900 text-center">{{round($product->COSTO,2) ." "."$"}}</td>
                        @endif
                        
                          @if($user->userType == 1 || $user->userType == 2 || $user->userType == 3 || $user->userType == 0 || $user->userType == 4)
                            @if($product->UBICACION == - 1)
                            <td class="p-3 text-sm font-semibold text-center text-gray-900">Sin Ubicacion</td>
                            @else
                            <td class="p-3 text-sm font-semibold text-center text-gray-900">{{$product->UBICACION}}</td>
                            
                            
                            @endif
                              
                        @endif
                        
                   
                        

                    </tr>
                    @endforeach


                    
                </thead>
            </table>
        </div>

        

        


  

</x-app-layout>


<script src="{{asset('js/search.js')}}" type="module"></script>