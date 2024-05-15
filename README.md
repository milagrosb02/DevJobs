# 💼 DevJobs 💼 #
> Este proyecto es una plataforma para buscar trabajo y publicar vacantes disponibles.

# Build With #
- Laravel (también con Laravel Breeze)
- Tailwind

# Requisites #
- PHP 8.1
- Composer
- MySQL
- Laravel version 10
- Mailhog


# Installation #
1. Clona este repositorio en tu máquina local.
2. Instala las dependencias del proyecto ejecutando
 ```bash
    composer install
 ```
3. Crea una copia del archivo .env.example y renómbralo a .env. Luego, configura las variables de entorno, especialmente la conexión a la base de datos.
4. Genera una nueva clave de aplicación ejecutando php artisan key:generate.
5. Ejecuta las migraciones de la base de datos para crear las tablas necesarias con el comando php artisan migrate.
6. Si no tienes mailhog, te dejo unos pequeños pasos para instalarlo:
   - 6.1. Instalar go desde https://go.dev/doc/install y luego lo ejecutas. Puedes comprobarlo si se instalo correctamente en la consola del cmd tipeando "go version".
   - 6.2. Instalar mailhog con go. Ejecuta en la consola del cmd: go install github.com/mailhog/MailHog@latest y comenzará la descarga.
   - 6.3. Una vez instalado, se debe iniciar el servicio. En la consola del cmd ejecuta "mailhog" y se iniciara. Debes dejar abierta la consola o de lo contrario, el servicio se detendra.
   - 6.4. Ve al navegador y escribe (en la mayoria de los casos) http://localhost:8025/ para poder acceder al dashboard (si esto no funciona, a la url de tu servidor local, agrega el puerto :8025 para acceder.

  
# Usage # 
- Para ejecutar el proyecto, primero debes correr en la terminal
   ```bash
    npm run dev
    ```
- Luego, el servidor de Laravel (en forma local)
   ```bash
    php artisan serve

Esto te llevara a la pantalla principal. Puedes observar que hay un buscador y unos filtros por categoria y salario mensual, estos mismos son publicados por los reclutadores. 

## Iniciar Sesion / Registro ##
 - Primero debes iniciar el servicio de mailhog. Como explique en el paso 6.3 y 6.4.
 - Si no tienes una cuenta, debes hacer click en la parte superior arriba de la derecha donde dice "Crear Cuenta". Rellena con tus datos y luego crea la cuenta. Puedes elegir roles: el de reclutador o el developer.
 - Una vez completado tus datos. Se mostrara un cuadro para enviar un email de confirmación al correo escrito. Debes hacer clic en enviar email.
 - Luego ve a tu navegador y escribe: http://localhost:8025/ y alli te aparecera el correo de verificacion. Haz clic en el mismo y dale a "Confirmar Cuenta".
   
# Si escogiste el rol de recruiter #
 - Esto te redireccionara al panel de las vacantes publicadas. Como es la primera vez que ingresas ala sitio te aparece que no hay vacantes para mostrar, hasta que publiques una.

# Si escogiste el rol de developer #
- Esto te redireccionara al dashboard principal, al mismo que al inicial la aplicacion. Aqui podras ver las vacantes publicadas por los reclutadores y podras postularte a una.

