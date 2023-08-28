<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-12xl">
            {{ __('Reportes') }}
        </h2>
    </x-slot>

   
        <div class="flex py-2 mx-auto w-full">
           
        </div>

        <div class="overflow-auto max-w-7xl mx-auto flex gap-10 pt-5 rounded-lg">
            <table class="w-full mx-auto shadow-xl rounded-xl ">
                <thead class="bg-gray-50">
                    <tr class="border-b border-gray-600">
                        <td class="p-3 text- text-sm font-bold text-gray-900 text-center">NOMBRE </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">DESCRIPCION </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">DESCARGAR </td>
                       
                        
                    </tr>

                  

                    @foreach($reportes as $report)
                    <tr class=" border-b hover:bg-gray-200 duration-300">
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$report->name}}</td>
                        <td class="p-3 text-sm font-semibold text-gray-900 text-center">{{$report->descripcion}} </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center"> <a href=" {{ url('/reportes/descargar') }}" class="rounded mx-2 bg-slate-700 px-4 py-2 text-white transition  hover:bg-slate-500 duration-300" >Descargar</a></td>
               
                  
                        
                              
               
                        
                    </tr>
                    @endforeach


                    
                </thead>
            </table>
        </div>

        <ul id="showlist"></ul>

        <div class=" mx-auto my-5 ">
        

        </div>


  

</x-app-layout>


<script src="{{asset('js/search.js')}}" type="module"></script>