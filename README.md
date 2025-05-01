# Examen Parcial 2 - Desarrollo y Técnicas de Aplicaciones Web DTW135 - GT01
<p align="center">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Escudo_de_la_Universidad_de_El_Salvador.svg/1200px-Escudo_de_la_Universidad_de_El_Salvador.svg.png" alt="LogoUes" width="20%" height="40%">
</p>
<p align="center">
    <img src="https://drive.google.com/uc?export=view&id=1K45h2JPReuWVNaSC_PmiPYmEIyGLCqeF" alt="LogoIDS" width="50%" height="100%">
</p>

## 📘 Tema: Almacenamiento Local y Web Services
Este proyecto corresponde al segundo examen parcial del curso **Desarrollo y Técnicas de Aplicaciones Web**, y tiene como objetivo implementar funcionalidades relacionadas con la lectura de archivos XML, conversión a JSON y el consumo de un servicio web SOAP gratuito.

## 📂 Estructura del Proyecto

Este proyecto fue desarrollado a partir del repositorio base proporcionado y bifurcado (fork) en la cuenta GitHub de uno de los miembros del grupo, siguiendo las instrucciones brindadas.

## 🔑 Credenciales para iniciar sesión:
**Usuario:** parcialdtw
**Contraseña:** parcialdtw

## 🛠️ Tecnologías Utilizadas

- Laravel 10+
- PHP 8+
- XML
- JSON
- Bootstrap 5
- Servicio SOAP gratuito ([DneOnline Calculator](https://www.dneonline.com/calculator.asmx?WSDL))

## 🛠️ Funcionalidades Implementadas

### 1. Lectura de XML y Conversión a JSON

- Se agregó un archivo XML con registros ficticios en `storage/xml/usuarios.xml`.
- Se creó una ruta y un controlador para leer el archivo XML y convertirlo a JSON.
- Los datos JSON se muestran en una tabla utilizando Bootstrap en la vista `preferencias.blade.php`.

### 2. Consumo de Servicio SOAP

- Se implementó una vista donde el usuario puede ingresar dos números y seleccionar una operación (suma o multiplicación).
- Se procesan las operaciones a través del servicio web SOAP (https://www.dneonline.com/calculator.asmx?WSDL).
- El resultado se muestra dinámicamente en una vista.

## 👥 Integrantes del Grupo

1. BA22025 | Fernando José Barraza Álvarez
2. JQ22003 | Axel Rodrigo Juarez Quevedo
3. MM18069 | Wendy Carolina Mejía Martínez
4. MR21082 | Reyna Guadalupe Miranda Rivas
5. PM18077 | Francisco Javier Peraza Martínez
