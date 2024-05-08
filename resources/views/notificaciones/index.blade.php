<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold text-center mb-10">Mis Notificaciones</h1>
                
                    {{-- en caso de que haya notificaciones --}}
                    @forelse ($notificaciones as $notificacion)
                        {{-- se muestran las notificaciones --}}
                        <div class="p-5 border border-gray-200 lg:flex justify-between lg:items-center">
                            <div>
                                <p>
                                    Tienes un nuevo candidato en: 
                                    <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                </p>
                                <p> 
                                    <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                </p>
                            </div>   
                            

                            <div class="mt-5 lg:mt-0">
                                 {{-- Enlace "Ver Candidatos" alineado a la derecha dentro del mismo contenedor --}}
                                <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}" class="bg-purple-500 p-3 text-sm uppercase font-bold text-white rounded-lg">
                                    Ver Candidatos
                                </a>
                            </div>   
                           

                        </div>  
                    @empty
                        <p class="text-center text-gray-600">No hay nuevas notificaciones</p>
                    @endforelse
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
