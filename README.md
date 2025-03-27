# Manual de Instalación

## 1. Requisitos previos

Antes de comenzar,  tener instalado:

- **XAMPP** (versión recomendada: PHP 8.0 o superior)
- **Navegador web** (Chrome, Firefox, Edge, etc.)
- PHP versión : 8.0 o superior

## 2. Instalación de XAMPP

1. Descarga XAMPP desde [Apache Friends](https://www.apachefriends.org/es/index.html).
2. Instale XAMPP y seleccione los módulos **Apache** y **MySQL**.
3. Inicie el **Panel de Control de XAMPP** y active **Apache** y **MySQL**.

## 3. Configuración del Proyecto

1. Copie la carpeta de  proyecto (por ejemplo, `pruebas`) en:
   
    - C:\xampp\htdocs\pruebas
    - La carpeta 'prueba' debe ser abierta en el editor de codigo
    - Descargar el archivo 'index.php' de este repositorio
    - Agregarlo a la carpeta 'prueba'
    
2. Crear una base de datos:

## 4. Creación de la Base de Datos

1. En el panel de XAMPP en el modulo de MySQL seleccione Admin 
2. En el panel de 'phpMyAdmin' diríjase al panel de opciones, seleccione 'SQL' y ingrese el siguiente código SQL para crear la base de datos : 

```sql
-- Crear la base de datos
CREATE DATABASE user_dev;

-- Usar la base de datos recién creada
USE user_dev;

-- Crear la tabla user_status
CREATE TABLE user_status (
    id INT PRIMARY KEY,
    status VARCHAR(20) NOT NULL
);

-- Insertar valores en la tabla user_status
INSERT INTO user_status (id, status) VALUES
(0, 'no_active'),
(1, 'active');

-- Crear la tabla users 
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    age INT,
    status INT,
    FOREIGN KEY (status) REFERENCES user_status(id)
);
```

## 6. Ejecutar el Proyecto

1. Abre el navegador y accede a:
   ```
   http://localhost/pruebas/
   ```
2. Si ve la página de inicio, la instalación fue exitosa.

---

Con esto, tu proyecto estará funcionando correctamente en XAMPP.
