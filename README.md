# 🛒 Tienda Inglesa — Proyecto de Tienda Online 

> Proyecto Full Stack desarrollado con **PHP**, **MySQL**, **HTML5**, **CSS3** y **JavaScript**.  
> Simula una tienda online funcional con catálogo público, carrito de compras, sistema de usuarios y panel de administración.

---
<img width="1907" height="875" alt="screentiendainglesa" src="https://github.com/user-attachments/assets/1f2c48ed-19f7-46c9-8825-cffa7461894b" />


## 🚀 Descripción General

**Tienda Inglesa** es una tienda online completamente funcional, desarrollada como proyecto de portafolio.  
El sistema permite navegar productos por categorías, agregar ítems al carrito, realizar compras y gestionar la información desde un panel de administración.

Cuenta con:
- **Catálogo de productos dinámico** conectado a base de datos.
- **Gestión de usuarios:** registro, inicio y cierre de sesión.
- **Carrito de compras** persistente por sesión.
- **Panel administrativo:** CRUD de categorías, marcas, productos y pedidos.
- **Diseño responsive** con Bootstrap.

---

## 📁 Estructura del Proyecto

### 🧩 Frontend / Rutas públicas
| Archivo | Descripción |
|----------|--------------|
| [`index.php`](TiendaInglesa/index.php) | Página principal con productos destacados. |
| [`Producto.php`](TiendaInglesa/Producto.php) | Vista individual del producto. |
| [`Carrito.php`](TiendaInglesa/Carrito.php) | Carrito de compras con totales dinámicos. |
| [`Registrarse.php`](TiendaInglesa/Registrarse.php) | Registro de nuevos usuarios. |
| [`Login.php`](TiendaInglesa/Login.php) | Inicio de sesión de clientes. |
| [`includes/header.php`](TiendaInglesa/includes/header.php) y [`includes/footer.php`](TiendaInglesa/includes/footer.php) | Plantillas de encabezado y pie. |

### ⚙️ Backend y utilidades
| Archivo | Función |
|----------|----------|
| [`Funciones/conexion.php`](TiendaInglesa/Funciones/conexion.php) | Configura la conexión a la base de datos. |
| [`Funciones/registrarUser.php`](TiendaInglesa/Funciones/registrarUser.php) | Maneja el registro de usuarios (si está implementado). |
| [`Assets/js/ValidacionLogin.js`](TiendaInglesa/Assets/js/ValidacionLogin.js) | Validación del formulario de login. |
| [`Assets/js/ValidarRegistro.js`](TiendaInglesa/Assets/js/ValidarRegistro.js) | Validación del formulario de registro. |

### 🔑 Panel de administración
| Archivo | Descripción |
|----------|-------------|
| [`admin/index.php`](TiendaInglesa/admin/index.php) | Login del administrador. |
| [`admin/inc/templates/header.php`](TiendaInglesa/admin/inc/templates/header.php) | Encabezado del panel. |
| [`admin/inc/templates/barra.php`](TiendaInglesa/admin/inc/templates/barra.php) | Barra lateral de navegación. |
| [`admin/inc/modelos/modelo-admin.php`](TiendaInglesa/admin/inc/modelos/modelo-admin.php) | Lógica de autenticación y operaciones del panel. |
| [`admin/inc/funciones/funciones.php`](TiendaInglesa/admin/inc/funciones/funciones.php) | Funciones auxiliares del backend. |

---

## ⚙️ Requisitos (local)

- PHP >= **7.2**
- MySQL o MariaDB
- Servidor web (Apache / Nginx)
- Extensiones PHP: `mysqli`, `session`

---

## 🧠 Instalación y ejecución (entorno local)

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/elbagu/Tienda_Online_Proyecto


URL
--------------------------
https://tiendacompletaismael.infinityfreeapp.com/


Autor
-----
Ismael Bazzino
Email: ismael.bazzino@gmail.com
GitHub:https://github.com/elbagu
