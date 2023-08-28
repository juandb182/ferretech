<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion de Usuarios') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="flex py-2 mx-auto w-full">
            <form action="{{ url('/searchUser') }}" type="get" method="get" class="w-full flex ">
                <input type="search" value="" name="query" placeholder="Realizar busqueda" class="w-full border-gray  mx-2 rounded-lg bg-white px-4 py-2 text-gray-900">
                <button class="rounded mx-2  bg-green-500 px-4 py-2 text-white transition  hover:bg-green-300 duration-300" type="submit"><a href="{{route("users.create")}}">Crear</a></button>
                <button class="rounded mx-2 bg-slate-700 px-4 py-2 text-white transition  hover:bg-slate-500 duration-300" type="submit">Buscar</button>

            </form>
        </div>

       

            @if(Session::has("success"))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">Success</p>
                <p>{{session("success")}}</p>

            </div>
            @endif

            @if(Session::has("danger"))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p class="font-bold">Error</p>
                <p>{{session("danger")}}</p>

            </div>
            @endif

            <div class="overflow-auto rounded-lg shadow">

            <table class="w-full mx-auto shadow-xl ">
                <thead class="bg-gray-50">
                    <tr class="border-b border-gray-600">
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">ID #️⃣</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">NOMBRE 📓</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">EMAIL 📧</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">TIPO DE USUARIO 🧍</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">FECHA DE CREACION 📅</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">ULTIMA ACTUALIZACION📅</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">EDITAR 🗂️ </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">ELIMINAR ❌</td>
                    </tr>


                    @foreach($users as $user)
                    <tr class=" border-b ">
                        <td class="p-3 text-sm font-bold text-gray-900 text-center ">{{$user->id}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$user->name}} </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$user->email}}</td>

                        <td class="p-3 text-sm font-bold text-gray-900 text-center">

                            @if($user->userType == 1)
                            <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Admin</span>
                            @elseif($user->userType == 2)
                            <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-800">Gerencia</span>
                            @elseif($user->userType == 3)
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-800">Costos</span>
                            @elseif($user->userType == 4)
                            <span class="bg-purple-100 text-purple-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-purple-200 dark:text-purple-800">Consultor</span>
                            @elseif($user->userType == 0)
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Usuario</span>


                            @endif
                        </td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$user->created_at}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">{{$user->updated_at}}</td>
                        <td class="p-3 text-sm font-bold text-gray-900 text-center">



                            <form action="{{url('users/'.$user->id.'/edit')}}" method="GET">
                                @csrf
                                {{ method_field('PUT') }}

                                <button type="submit" class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded duration-300">
                                    Editar ✏️
                                </button>
                            </form>


                        </td>
                        <td class=" p-3 text-sm font-bold text-gray-900 text-center">
                            <form action="{{url('users/'.$user->id)}}" method="POST">
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

        <div class=" mx-auto my-5 ">
            {{ $users->links() }}

        </div>

    </div>

</x-app-layout>