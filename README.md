
# Api MatizWeb

Matiz API Backend es una API RESTful construida con Laravel 9 y MySQL, que proporciona las funcionalidades necesarias para el proyecto Matiz.

## 🔧 Tecnologías utilizadas

- **Laravel 10.10**: Como framework PHP para construir la API.
- **MySQL**: Como sistema de gestión de base de datos.
- **PHP 8.2**: Como lenguaje de programación.
- **Composer**: Como gestor de dependencias.
- **github**: Control de versiones.

## 📥 Requisitos previos

- PHP 8.2 o superior
- Composer
- MySQL 8.0 o superior
- Git

## 💻 Instalación

1. Clona el repositorio en tu máquina local:

git clone https://github.com/MatizEmociones/matizBackend.git


2. Instala las dependencias con Composer:

composer install


3. Duplica el archivo `.env.example` y renómbralo a `.env`. Configura la base de datos y otras variables según sea necesario.

4. Genera la clave de la aplicación:

php artisan key:generate


5. Migrar la base de datos:

php artisan migrate


6. Inicia el servidor de desarrollo:

php artisan serve


### Endpoints

A continuación, se presentan los endpoints disponibles en la API.

#### Autenticación

Rutas de JournalController

    GET /journals: Devuelve una lista de todos los diarios.
    GET /journals/{id}: Devuelve los detalles de un diario específico.
    POST /journals: Crea un nuevo diario.
    PUT /journals/{id}: Actualiza un diario específico.
    DELETE /journals/{id}: Elimina un diario específico.

Rutas de EmotionController

    GET /emotions: Devuelve una lista de todas las emociones.
    GET /emotions/{id}: Devuelve los detalles de una emoción específica.
    POST /emotions: Crea una nueva emoción.
    PUT /emotions/{id}: Actualiza una emoción específica.
    DELETE /emotions/{id}: Elimina una emoción específica.

    Rutas de IntensityController

    GET /intensities: Devuelve una lista de todas las intensidades.
    GET /intensities/{id}: Devuelve los detalles de una intensidad específica.
    POST /intensities: Crea una nueva intensidad.
    PUT /intensities/{id}: Actualiza una intensidad específica.
    DELETE /intensities/{id}: Elimina una intensidad específica.


## 📝 Contribuciones

Si deseas contribuir al proyecto, sigue las siguientes pautas:

1. Fork el proyecto.
2. Crea una rama de características (`git checkout -b feature/nombre-de-la-caracteristica`).
3. Realiza tus cambios y haz un commit (`git commit -m 'Agregar nueva característica'`).
4. Púllalo a la rama principal (`git pull origin main`).
5. Realiza un push a tu rama (`git push origin feature/nombre-de-la-caracteristica`).
6. Abre una solicitud de extracción.

## 📝 Licencia

Este proyecto está bajo la Licencia [MIT](https://github.com/usuario/matiz-api-backend/blob/main/LICENSE).

## 👥 Autora

- [**Johana Sandoval**](https://github.com/Sandovaljohana)

