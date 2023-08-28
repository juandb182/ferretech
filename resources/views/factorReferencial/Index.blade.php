<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Factores Referenciales') }}
        </h2>
    </x-slot>

    <div class="">
        
                    @if(Session::has("success"))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                        <p class="font-bold">Success</p>
                        <p>El {{session("success")}}</p>
        
                    </div>
                    @endif

    






        <div class="container mt-4 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 mx">
                @foreach($factores as $factor)

                <div class="card m-2 cursor-pointer bg-white border border-gray-400 rounded-lg hover:shadow-md hover:border-opacity-0 transform hover:-translate-y-1 transition-all duration-200">
                    <div class="m-3 ">
                        <h2 class="text-lg mb-2">Factor Referencial
                            <span class="text-sm text-teal-800 font-mono bg-teal-100 inline rounded-full px-2 align-top float-right animate-pulse">Dolar</span>
                        </h2>
                        <p class="font-light font-mono text-sm text-gray-700 hover:text-gray-900 transition-all duration-200 text-center text-7xl">{{$factor->FactorReferencial . "Bs"}}</p>

                        <p class="font-light font-mono text-sm text-gray-700 hover:text-gray-900 transition-all duration-200 text-center ">Ultima actualizacion : {{$factor->updated_at}}</p>


                        <form action="{{url('factor_ref/create')}}" method="GET">
                            @csrf
                               
                            <button type="submit" class="mt-2 w-full text-white bg-slate-700 rounded mx-auto p-2 text-white-700 hover:bg-slate-500 duration-500">Actualizar</button>
                        </form>

                    </div>
                </div>


                @endforeach
            </div>
        </div>





        <br>



        <div class=" mx-auto my-5 ">


        </div>

    </div>

</x-app-layout>