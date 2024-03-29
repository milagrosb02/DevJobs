    <!-- con este wire submit conecto el componente con el formulario -->
<form class="md:w-1/2 space-y-6" wire:submit.prevent='crearVacante'>

     <!-- Titulo vacante -->
     <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />

        <x-text-input id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo"
            :value="old('titulo')"
            placeholder="Titulo de Vacante" 
         />


         <!-- mensaje de error -->
         @error('titulo')
            <!-- llamo a componente de mostrar alerta -->
            <!-- le paso el valor dinamico de message -->
             <livewire:mostrar-alerta :message="$message">
         @enderror

    </div>




     <!-- Select Salario -->
     <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />

        <select
                id="salario"
                wire:model="salario"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >

        <!-- Opciones de Salarios -->
        <!-- Obtengo los registros del seeder -->
        <option>-- Seleccione --</option>

        <!-- Recorro las opciones -->
        @foreach ( $salarios as $salario )
            <option value="{{ $salario->id }}">{{$salario->salario}}</option>
        @endforeach
            
        </select> 
        
        <!-- mensaje de error -->
        @error('salario')
        <!-- llamo a componente de mostrar alerta -->
        <!-- le paso el valor dinamico de message -->
         <livewire:mostrar-alerta :message="$message">
     @enderror

    </div>



    <!-- Select Categoria -->
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />

        <select
                id="categoria"
                wire:model="categoria"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >

        <!-- Opciones de Categoria -->
        <!-- Obtengo los registros del seeder -->
        <option>-- Seleccione --</option>

        <!-- Recorro las opciones -->
        @foreach ( $categorias as $categoria )
            <option value="{{ $categoria->id }}">{{$categoria->categoria}}</option>
        @endforeach
            
        </select>   
        
        
        <!-- mensaje de error -->
        @error('categoria')
        <!-- llamo a componente de mostrar alerta -->
        <!-- le paso el valor dinamico de message -->
         <livewire:mostrar-alerta :message="$message">
     @enderror

    </div>



    <!-- Empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Uber, Spotify..." 
         />


         <!-- mensaje de error -->
         @error('empresa')
            <!-- llamo a componente de mostrar alerta -->
            <!-- le paso el valor dinamico de message -->
             <livewire:mostrar-alerta :message="$message">
         @enderror

    </div>



    <!-- Fecha de postulacion -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />

        <x-text-input id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" :value="old('ultimo_dia')"
         />


         <!-- mensaje de error -->
         @error('ultimo_dia')
            <!-- llamo a componente de mostrar alerta -->
            <!-- le paso el valor dinamico de message -->
             <livewire:mostrar-alerta :message="$message">
         @enderror

    </div>



    <!-- Descripcion del trabajo -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion de puesto')" />

        <textarea
            wire:model="descripcion"
            placeholder="Descripcion general del puesto, experiencia"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
        ></textarea>

        <!-- mensaje de error -->
        @error('descripcion')
        <!-- llamo a componente de mostrar alerta -->
        <!-- le paso el valor dinamico de message -->
         <livewire:mostrar-alerta :message="$message">
     @enderror

    </div>



    <!-- Imagen -->
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />

        <x-text-input id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen"
            accept="image/*"
         />


        <!-- agregando previw de la imagen -->
        <div class="my-5 w-96">

            @if ($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}"/>
            @endif

        </div>    


         <!-- mensaje de error -->
         @error('imagen')
            <!-- llamo a componente de mostrar alerta -->
            <!-- le paso el valor dinamico de message -->
             <livewire:mostrar-alerta :message="$message">
         @enderror

    </div>


    <x-primary-button class="w-full justify-center">
        {{ __('Crear Vacante') }}
    </x-primary-button>

</form>    
