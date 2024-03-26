<form class="md:w-1/2 space-y-6">

     <!-- Titulo vacante -->
     <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />

        <x-text-input id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            name="titulo" :value="old('titulo')"
            placeholder="Titulo de Vacante" 
         />

        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>




     <!-- Select Salario -->
     <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />

        <select
                id="salario"
                name="salario"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            
        </select>    

        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>



    <!-- Select Categoria -->
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />

        <select
                id="categoria"
                name="categoria"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            
        </select>    

        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>



    <!-- Empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            name="empresa" :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Uber, Spotify..." 
         />

        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>



    <!-- Fecha de postulacion -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />

        <x-text-input id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            name="ultimo_dia" :value="old('ultimo_dia')"
         />

        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>



    <!-- Descripcion del trabajo -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion de puesto')" />

        <textarea
            name="descripcion"
            placeholder="Descripcion general del puesto, experiencia"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
        ></textarea>

        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>



    <!-- Imagen -->
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />

        <x-text-input id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            name="imagen"
         />

        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>


    <x-primary-button class="w-full justify-center">
        {{ __('Crear Vacante') }}
    </x-primary-button>

</form>    
