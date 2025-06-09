# 🎲 Catálogo y Buscador de Juegos de Mesa

Aplicación web desarrollada en **PHP**, **JavaScript** y **HTML** para consultar, filtrar e insertar juegos de mesa en una base de datos. Ideal para coleccionistas, aficionados y tiendas que deseen gestionar un catálogo interactivo de juegos.

---

## 🧩 Funcionalidades principales

- 🔍 **Búsqueda avanzada** con filtros por:
  - Nombre
  - Temática
  - Dificultad
  - Nº de jugadores mínimo y máximo
  - Duración mínima y máxima
  - Rango de año de publicación
- 🧠 **Validación de datos** en la inserción de nuevos juegos.
- 📥 **Inserción de juegos** desde el navegador con control de errores.
- 📷 **Visualización de imágenes** de los juegos o placeholder si no existe.
- 🧭 Interfaz simple, funcional y adaptable.

---

## 🚀 Tecnologías utilizadas

- **Frontend**:
  - HTML5 + CSS3
  - JavaScript (nativo)
- **Backend**:
  - PHP 7.4+ 
  - MySQL/MariaDB
    
---

## ⚙️ Requisitos

- Servidor local (XAMPP, WAMP, Laragon…)
- PHP 7.4 o superior
- MySQL/MariaDB
- Navegador web moderno

---

## 📦 Instalación

1. Clona este repositorio o descárgalo:
   ```bash
   git clone https://github.com/edulumulu/catalogo-juegos.git```

2. Importa la base de datos:
- Abre phpMyAdmin
- Crea una nueva base de datos, por ejemplo juegos_mesa
- Importa el archivo incluido en el proyecto:
```bash
catalogo-juegos/juegos.sql
```
  
3. Configura la conexión en db.php:
```bash
$host = 'localhost';
$db = 'juegos_mesa';
$user = 'tu_usuario';
$pass = 'tu_contraseña';
```

4. Ejecuta el proyecto en tu navegador:
```bash
http://localhost/catalogo-juegos/index.php
```

---

## 📥 Insertar juegos
Con el botón de inserción (insertar.php) puedes añadir un nuevo juego. Se validan los siguientes campos:
- Todos los campos obligatorios
- Años válidos (numéricos)
- Rango de jugadores coherente
- Duración positiva
- Imagen opcional (se puede dejar vacía)

---

## 🧪 Búsqueda de juegos
Se puede buscar por múltiples criterios combinados. El sistema realiza una consulta dinámica según los filtros que rellenes.

---

## 🧑‍💻 Autor
Desarrollado por edulumulu.
Este proyecto ha sido creado con fines educativos y de práctica personal.

---

⭐ ¡Si te ha sido útil o te ha gustado, no olvides dejar una estrella al repo!
