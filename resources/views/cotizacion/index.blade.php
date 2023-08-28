<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cotizacion de Inventario') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="flex py-2 mx-auto w-full">

        <form action="{{ url('/imprimirPDF') }}" type="get" method="GET" class="w-full flex ">
            <button class="rounded mx-2 shadow-sm w-full  bg-emerald-500 px-4 py-2 text-white transition  hover:bg-emerald-400 duration-300" type="submit">
                Imprimir PDF</button>

                </form>

            <form action="{{ url('/download/pdf') }}" type="get" method="GET" class="w-full flex ">
                <button class="rounded mx-2 shadow-sm w-full  bg-slate-700 px-4 py-2 text-white transition  hover:bg-slate-500 duration-300" type="submit">
                    Descargar PDF</button>

            </form>


            <form action="{{ url('/clear') }}" type="get" method="GET" class="w-full flex ">
                <button class="rounded mx-2 shadow-sm w-full  bg-rose-500 px-4 py-2 text-white transition  hover:bg-rose-400 duration-300" type="submit" onclick="return confirm('Esta seguro de que desea limpiar todo los registros?');">
                    Limpiar</button>


            </form>
        </div>

        @if(Session::has("success"))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 w-full" role="alert">
            <p class="font-bold">Success</p>
            <p>{{session("success")}}</p>

        </div>
        @endif

        @if(Session::has("danger"))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full" role="alert">
            <p class="font-bold">Error</p>
            <p>{{session("danger")}}</p>

        </div>
        @endif


        <div class="overflow-auto rounded-lg shadow">



            <table class="w-full mx-auto shadow-xl ">
                <thead class="bg-gray-50">
                    <tr class="border-b border-gray-600">
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">CODIGO #️⃣</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">PRODUCTOS 🏭</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">CANTIDAD 🗳️</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">PRECIO UNITARIO 💲</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">PRECIO TOTAL 💲</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">PRECIO UNITARIO BS 💵 </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">PRECIO TOTAL BS 💵 </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">AGREGADO EL DIA 📆 </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">EDITAR ✏️</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">ELIMINAR ❌</td>

                    </tr>


                    @foreach($products as $product)
                    <tr class=" border-b">
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$product->codigo}}</td>
                        <td class="p-3 text-sm font-semibold text-gray-900">{{$product->producto}} </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$product->cantidad}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{round($product->precio,2) ." "."$"}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{round($product->precio_total_dolares,2)." "."$"}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{round($product->precio_bolivares,2)." "."Bs"}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{round($product->precio_total_bolivares,2)." "."Bs"}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$product->updated_at}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">



                            <form action="{{url('cotizar/'.$product->id.'/edit')}}" method="GET">
                                @csrf
                                {{ method_field('PUT') }}

                                <button type="submit" class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded duration-300">
                                    Editar ✏️
                                </button>
                            </form>


                        </td>
                        <td class=" p-3 text-sm font-bold text-gray-900 text-center">
                            <form action="{{url('cotizar/'.$product->id)}}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}

                                <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded duration-300" onclick="return confirm('Esta seguro de eliminar este item?');">
                                    Eliminar 🗑️
                                </button>
                            </form>



                        </td>


                    </tr>
                    @endforeach




                </thead>
            </table>
        </div>

        <br>



        <div class=" mx-auto my-5 ">


        </div>

    </div>

</x-app-layout>