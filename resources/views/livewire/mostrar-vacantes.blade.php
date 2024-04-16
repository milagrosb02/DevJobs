<div>
    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

         <!-- itero sobre vacantes-->
        <!-- for else actua como for each -->
        @forelse ($vacantes as $vacante )
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center dark:text-gray-100 dark:bg-gray-800">
                
                <div class="space-y-3">

                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>

                    <p class="text-sm font-bold text-gray-600 dark:dark:text-gray-100">Empresa: {{$vacante->empresa}}</p>

                    <p class="text-sm text-gray-500 dark:dark:text-gray-100">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>

                </div>



                <div class="flex flex-col gap-3 mt-5 md:flex-row items-strench md:mt-0">


                    <a class="px-4 py-2 text-xs font-bold text-center text-white rounded-lg bg-purple-900 dark:bg-white dark:text-black" href="#">
                        Candidatos
                    </a>


                    <a class="px-4 py-2 text-xs font-bold text-center text-white bg-blue-800 rounded-lg dark:bg-blue dark:text-white" href=" {{ route('vacantes.edit', $vacante->id) }}">
                        Editar
                    </a>


                    {{-- el $emit lo que hace es emitir un evento de prueba --}}
                    <button 
                        type="button"
                        wire:click="$dispatch('mostrarAlerta', {{$vacante->id}})"
                        class="px-4 py-2 text-xs font-bold text-center text-white bg-red-600 rounded-lg dark:bg-red dark:text-white" >
                        Eliminar
                    </button>

                </div>
            </div>

        @empty
         <!-- si esta vacio, imprime el error. Esto actua como un else ( o sea un caso contrario )-->
            <p class="p-3 text-sm text-center text-gray-600">No hay vacantes que mostrar</p>
        @endforelse
    </div>
 
    <div class="p-2 mt-10">
        {{ $vacantes->links() }}
    </div>
</div>


{{-- colocando estilos desde las directivas del archivo app.blade --}}
@push('scripts')
    <script 
        src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    </script>


<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('mostrarAlerta', (vacanteId) => {
            Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "Una Vacante eliminada no se puede recuperar:(",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // ELiminar vacante
                    // Se debe emitir un evento desde el componente
                    @this.call('eliminarVacante',vacanteId);
                    Swal.fire(
                        'Se eliminó la Vacante',
                        'Eliminado correctamente',
                        'success'
                    )
                }
            })

        });
    });
</script> 


@endpush