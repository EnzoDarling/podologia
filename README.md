# Sistema Web Podológico

Este sistema esta fue desarrollado en Symfony, MySql (Lamp stack en Linux) y Bootstrap en la interfáz gráfica. Tal aplicación web fue pensado para el control de pacientes, turnos, fichas médicas, vademecum podológico. Inicialmente, fue enfocado para la plataforma de escritorio pero debido al fuerte uso de móviles, se encuentra en desarrollo para dicho dispositivo.

Requerimientos
----------------
* PHP v5.5.9 o superior
* PDO-SQLite PHP extensiones habilitadas
* Doctrine v1.6
* Symfony Assetic Bundle v2.8
* Y los requerimientos usuales de Symfony

Instalación
-----------
1. Clonar repo
2. Ejecutar ```php bin/vendors install``` para instalar los requerimientos de vendors
3. Instalar assets con ```composer require symfony/assetic-bundle```
4. Crear la base de datos con ```php app/console doctrine:database:create```
5. Actualizar schema con ```php app/console doctrine:schema:create```