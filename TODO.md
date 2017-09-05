## Modulo principal (CORE)##

> Modulo Logger | BaseComponets  
> *Modulo usado para depuración y tracking de las clases*

- [x] Clase controladora principal
- [x] Guardar logs en distintas áreas y clases
- [x] Guardar log detallado (Hora, tiempo de ejecución, clase invocada, etc)
- [ ] Añadir todas las áreas de módulos y sub-módulos.
- [ ] Guardar logs en base de datos para depuraciones futuras.
- [ ] Estructurar áreas de logs mas *Human-Read*
- [ ] Documentar modulo.

> Modulo Warning | BaseComponets  
> *Modulo usado para depuración y tracking de clases*  
> *Guarda advertencias ocurridas durante el proceso de ejecución*

 - [x] Registrar advertencias de conexión en la base de datos.
 - [x] Crear clases *helpers* y concretas para manejar advertencias en el framework.
 - [x] Registrar advertencias en archivos de configuración.
 - [ ] Registrar advertencias en módulos de formatos.
 - [ ] Registrar advertencias en módulos de usuarios.
 - [ ] Registrar advertencias en módulos de Cookies.
 - [ ] Registrar advertencias en módulos de Paginas y sub-paginas.
 - [ ] Documentar modulo.

> Modulo de Error | BaseComponets  
> *Modulo usado para depuración y tracking de clases*  
> *Guarda errores ocurridas durante el proceso de ejecución*

 - [x] Guardar errores en conexiones a la base de datos.
 - [x] Guardar errores sobre registro de usuarios.
 - [ ] Registrar errores de los módulos de formatos.
 - [ ] Registrar errores en módulos de usuarios.
 - [ ] Registrar errores en módulos de Paginas y sub-paginas.
 - [ ] Documentar modulo.

> Modulo de Base de datos | ExtendedComponets  
> *Modulo usado para conexión de la base de datos*

 - [x] Permitir conexiones mysql.
 - [x] Métodos básicos para query SQL.
 - [x] Métodos básicos para realizar procedimientos (*procedure*) SQL.
 - [x] Métodos para controlar base de datos (llaves foráneas, ID's, charset).
 - [x] Crear modulo de conexión y métodos básicos.
 - [x] Crear modulo de configuración(recuperar y guardar configuración).
 - [ ] Documentar modulo.

> Modulo de Configuración de la pagina | ExtendedComponets  
> *Modulo usado para guardar la configuración en el framework*

 - [x] Recuperar configuración del framework.
 - [x] Guardar configuración del framework.
 - [x] Crear clases de configuración dentro del framework.
 - [ ] Documentar modulo.

> Modulo de Usuarios | REC1Componets  
> *Modulo usado para gestionar usuarios en el framework*

 - [x] Registro básico de usuarios.
 - [x] Recuperar usuarios de la base de datos.
 - [x] Recuperar usuarios mediante un token de acceso.
 - [x] Recuperar usuarios mediante sesiones(cookies).
 - [ ] Documentar modulo.

> Modulo de paginas | REC1Componets  
> *Modulo usado para gestionar paginas en el framework*

 - [x] Permitir *site-map* básico.
 - [x] Cargar paginas según estado del framework.
 - [ ] Documentar modulo.

**TODO | Sub-modulos**  
*Falta documentar en este documento sub-modulos del core del framework*

----------

## Modulo de Formatos ##

**NOTAS:**
**Es necesario definir estilo general para GUI (Carreras, Peds, Turnos, Formularios)**  
*Los Módulos de Carreras, Peds y Turnos son auxiliares para los formularios*

----------

> Modulo de Carreras  
> *Permite controlar carreras dentro del framework*

 - [x] Estructura SQL básica para carreras.
 - [x] Añadir carreras por defecto al instalador.
 - [x] Crear clases PHP para trabajar con objetos de carreras dentro del framework.
 - [x] Recuperar una lista de todas las carreras de la base datos.
 - [x] Recuperar carrera por ID.
 - [x] Insertar nuevas carreras dentro de la base de datos.
 - [x] Borrar carreras de la base de datos.
 - [x] Incluir plantilla Twig para controlar el modulo.
 - [x] *Twig* | Mostrar lista de carreras.
 - [x] *Twig* | Borrar carrera (hotfix).
 - [x] *Twig* | Insertar carrera (hotfix).
 - [x] *Twig* | Editar carrera (hotfix).
 - [ ] *Twig* | Buscador de carreras.
 - [ ] *Twig* | Filtros para carreras.
 - [ ] Editar carreras de la base de datos.
 - [ ] Recuperar lista de carreras por usuario.
 - [ ] Recuperar lista de carreras por nombre.
 - [ ] Recuperar lista de carreras por fecha de adición.
 - [ ] Recuperar lista de carreras por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de PEDS(Sedes)  
> *Permite controlar sedes dentro del framework*

 - [x] Estructura SQL básica para Peds.
 - [x] Añadir Peds por defecto al instalador.
 - [x] Crear clases PHP para trabajar con objetos de Peds dentro del framework.
 - [x] Recuperar una lista de todas las Peds de la base datos.
 - [x] Recuperar PED por ID.
 - [x] Insertar nuevas Peds dentro de la base de datos.
 - [x] Borrar Peds de la base de datos.
 - [x] Incluir plantilla Twig para controlar el modulo.
 - [x] *Twig* | Mostrar lista de Peds.
 - [ ] *Twig* | Borrar Ped.
 - [ ] *Twig* | Insertar Ped.
 - [ ] *Twig* | Editar Ped.
 - [ ] *Twig* | Buscador de Peds.
 - [ ] *Twig* | Filtros para Peds.
 - [ ] Editar Peds de la base de datos.
 - [ ] Recuperar lista de Peds por usuario.
 - [ ] Recuperar lista de Peds por nombre.
 - [ ] Recuperar lista de Peds por fecha de adición.
 - [ ] Recuperar lista de Peds por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de Turnos  
> *Permite controlar Turnos dentro del framework*

 - [x] Estructura SQL básica para Turnos.
 - [x] Añadir Turnos por defecto al instalador.
 - [x] Crear clases PHP para trabajar con objetos de Turnos dentro del framework.
 - [x] Recuperar una lista de todas los Turnos de la base datos.
 - [x] Recuperar Turno por ID.
 - [x] Insertar nuevos Turnos dentro de la base de datos.
 - [x] Borrar Turnos de la base de datos.
 - [x] Incluir plantilla Twig para controlar el modulo.
 - [x] *Twig* | Mostrar lista de Turnos.
 - [ ] *Twig* | Borrar Turno.
 - [ ] *Twig* | Insertar Turno.
 - [ ] *Twig* | Editar Turno.
 - [ ] *Twig* | Buscador de Turno.
 - [ ] *Twig* | Filtros para Turnos.
 - [ ] Editar Turnos de la base de datos.
 - [ ] Recuperar lista de Turnos por usuario.
 - [ ] Recuperar lista de Turnos por nombre.
 - [ ] Recuperar lista de Turnos por fecha de adición.
 - [ ] Recuperar lista de Turnos por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de Formulario | Formato 7.  
> *Permite controlar Formulario 7 dentro del framework*

 - [x] Estructura SQL básica para el Formato.
 - [x] Crear clases PHP para trabajar con objetos del Formato dentro del framework.
 - [x] Crear clases PHP para trabajar con set de datos de un formulario.
 - [x] Recuperar una lista de todas los Formatos(entrada) de la base datos.
 - [x] Recuperar Formulario(entrada) por ID.
 - [x] Insertar nuevos Formulario(entrada) dentro de la base de datos.
 - [x] Borrar Formulario(entrada) de la base de datos.
 - [ ] Actualizar información de un formulario(entrada) existente.
 - [x] Recuperar set de datos de formulario por ID de entrada.
 - [x] Recuperar entrada por ID de un set de datos.
 - [x] Insertar entrada para un set de datos.
 - [x] Borrar entrada de un set de datos.
 - [ ] Actualizar información de una entrada de un set de datos existente.
 - [ ] Incluir plantilla Twig(GUI) para controlar el modulo.
 - [ ] *Twig* | Insertar set de datos a un Formulario.
 - [ ] *Twig* | Mostrar lista de Formularios por usuario.
 - [ ] *Twig* | Mostrar lista de todos los Formularios .
 - [ ] *Twig* | Borrar Formulario.
 - [ ] *Twig* | Insertar Formulario.
 - [ ] *Twig* | Editar Formulario.
 - [ ] *Twig* | Buscador de Formulario.
 - [ ] *Twig* | Filtros para Formularios.
 - [ ] Editar Formulario de la base de datos.
 - [ ] Editar set de datos de un formulario en la base de datos.
 - [ ] Recuperar lista de Formularios por usuario.
 - [ ] Recuperar lista de Formularios por nombre.
 - [ ] Recuperar lista de Formularios por fecha de adición.
 - [ ] Recuperar lista de Formularios por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de Formulario | Formato 8.  
> *Permite controlar Formulario 8 dentro del framework*

 - [x] Estructura SQL básica para el Formato.
 - [ ] Crear clases PHP para trabajar con objetos del Formato dentro del framework.
 - [ ] Crear clases PHP para trabajar con set de datos de un formulario.
 - [ ] Recuperar una lista de todas los Formatos(entrada) de la base datos.
 - [ ] Recuperar Formulario(entrada) por ID.
 - [ ] Insertar nuevos Formulario(entrada) dentro de la base de datos.
 - [ ] Borrar Formulario(entrada) de la base de datos.
 - [ ] Actualizar información de un formulario(entrada) existente.
 - [ ] Recuperar set de datos de formulario por ID de entrada.
 - [ ] Recuperar entrada por ID de un set de datos.
 - [ ] Insertar entrada para un set de datos.
 - [ ] Borrar entrada de un set de datos.
 - [ ] Actualizar información de una entrada de un set de datos existente.
 - [ ] Incluir plantilla Twig(GUI) para controlar el modulo.
 - [ ] *Twig* | Insertar set de datos a un Formulario.
 - [ ] *Twig* | Mostrar lista de Formularios por usuario.
 - [ ] *Twig* | Mostrar lista de todos los Formularios .
 - [ ] *Twig* | Borrar Formulario.
 - [ ] *Twig* | Insertar Formulario.
 - [ ] *Twig* | Editar Formulario.
 - [ ] *Twig* | Buscador de Formulario.
 - [ ] *Twig* | Filtros para Formularios.
 - [ ] Editar Formulario de la base de datos.
 - [ ] Editar set de datos de un formulario en la base de datos.
 - [ ] Recuperar lista de Formularios por usuario.
 - [ ] Recuperar lista de Formularios por nombre.
 - [ ] Recuperar lista de Formularios por fecha de adición.
 - [ ] Recuperar lista de Formularios por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de Formulario | Formato 9.  
> *Permite controlar Formulario 9 dentro del framework*

 - [x] Estructura SQL básica para el Formato.
 - [ ] Crear clases PHP para trabajar con objetos del Formato dentro del framework.
 - [ ] Crear clases PHP para trabajar con set de datos de un formulario.
 - [ ] Recuperar una lista de todas los Formatos(entrada) de la base datos.
 - [ ] Recuperar Formulario(entrada) por ID.
 - [ ] Insertar nuevos Formulario(entrada) dentro de la base de datos.
 - [ ] Borrar Formulario(entrada) de la base de datos.
 - [ ] Actualizar información de un formulario(entrada) existente.
 - [ ] Recuperar set de datos de formulario por ID de entrada.
 - [ ] Recuperar entrada por ID de un set de datos.
 - [ ] Insertar entrada para un set de datos.
 - [ ] Borrar entrada de un set de datos.
 - [ ] Actualizar información de una entrada de un set de datos existente.
 - [x] Incluir plantilla Twig(GUI) para controlar el modulo.
 - [ ] *Twig* | Insertar set de datos a un Formulario.
 - [ ] *Twig* | Mostrar lista de Formularios por usuario.
 - [ ] *Twig* | Mostrar lista de todos los Formularios .
 - [ ] *Twig* | Borrar Formulario.
 - [ ] *Twig* | Insertar Formulario.
 - [ ] *Twig* | Editar Formulario.
 - [ ] *Twig* | Buscador de Formulario.
 - [ ] *Twig* | Filtros para Formularios.
 - [ ] Editar Formulario de la base de datos.
 - [ ] Editar set de datos de un formulario en la base de datos.
 - [ ] Recuperar lista de Formularios por usuario.
 - [ ] Recuperar lista de Formularios por nombre.
 - [ ] Recuperar lista de Formularios por fecha de adición.
 - [ ] Recuperar lista de Formularios por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de Formulario | Formato 10.  
> *Permite controlar Formulario 10 dentro del framework*

 - [x] Estructura SQL básica para el Formato.
 - [ ] Crear clases PHP para trabajar con objetos del Formato dentro del framework.
 - [ ] Crear clases PHP para trabajar con set de datos de un formulario.
 - [ ] Recuperar una lista de todas los Formatos(entrada) de la base datos.
 - [ ] Recuperar Formulario(entrada) por ID.
 - [ ] Insertar nuevos Formulario(entrada) dentro de la base de datos.
 - [ ] Borrar Formulario(entrada) de la base de datos.
 - [ ] Actualizar información de un formulario(entrada) existente.
 - [ ] Recuperar set de datos de formulario por ID de entrada.
 - [ ] Recuperar entrada por ID de un set de datos.
 - [ ] Insertar entrada para un set de datos.
 - [ ] Borrar entrada de un set de datos.
 - [ ] Actualizar información de una entrada de un set de datos existente.
 - [x] Incluir plantilla Twig(GUI) para controlar el modulo.
 - [ ] *Twig* | Insertar set de datos a un Formulario.
 - [ ] *Twig* | Mostrar lista de Formularios por usuario.
 - [ ] *Twig* | Mostrar lista de todos los Formularios .
 - [ ] *Twig* | Borrar Formulario.
 - [ ] *Twig* | Insertar Formulario.
 - [ ] *Twig* | Editar Formulario.
 - [ ] *Twig* | Buscador de Formulario.
 - [ ] *Twig* | Filtros para Formularios.
 - [ ] Editar Formulario de la base de datos.
 - [ ] Editar set de datos de un formulario en la base de datos.
 - [ ] Recuperar lista de Formularios por usuario.
 - [ ] Recuperar lista de Formularios por nombre.
 - [ ] Recuperar lista de Formularios por fecha de adición.
 - [ ] Recuperar lista de Formularios por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de Formulario | Formato 11.  
> *Permite controlar Formulario 11 dentro del framework*

 - [ ] Estructura SQL básica para el Formato.
 - [ ] Crear clases PHP para trabajar con objetos del Formato dentro del framework.
 - [ ] Crear clases PHP para trabajar con set de datos de un formulario.
 - [ ] Recuperar una lista de todas los Formatos(entrada) de la base datos.
 - [ ] Recuperar Formulario(entrada) por ID.
 - [ ] Insertar nuevos Formulario(entrada) dentro de la base de datos.
 - [ ] Borrar Formulario(entrada) de la base de datos.
 - [ ] Actualizar información de un formulario(entrada) existente.
 - [ ] Recuperar set de datos de formulario por ID de entrada.
 - [ ] Recuperar entrada por ID de un set de datos.
 - [ ] Insertar entrada para un set de datos.
 - [ ] Borrar entrada de un set de datos.
 - [ ] Actualizar información de una entrada de un set de datos existente.
 - [ ] Incluir plantilla Twig(GUI) para controlar el modulo.
 - [ ] *Twig* | Insertar set de datos a un Formulario.
 - [ ] *Twig* | Mostrar lista de Formularios por usuario.
 - [ ] *Twig* | Mostrar lista de todos los Formularios .
 - [ ] *Twig* | Borrar Formulario.
 - [ ] *Twig* | Insertar Formulario.
 - [ ] *Twig* | Editar Formulario.
 - [ ] *Twig* | Buscador de Formulario.
 - [ ] *Twig* | Filtros para Formularios.
 - [ ] Editar Formulario de la base de datos.
 - [ ] Editar set de datos de un formulario en la base de datos.
 - [ ] Recuperar lista de Formularios por usuario.
 - [ ] Recuperar lista de Formularios por nombre.
 - [ ] Recuperar lista de Formularios por fecha de adición.
 - [ ] Recuperar lista de Formularios por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de Formulario | Formato 12.  
> *Permite controlar Formulario 12 dentro del framework*

 - [x] Estructura SQL básica para el Formato.
 - [x] Crear clases PHP para trabajar con objetos del Formato dentro del framework.
 - [x] Crear clases PHP para trabajar con set de datos de un formulario.
 - [x] Recuperar una lista de todas los Formatos(entrada) de la base datos.
 - [x] Recuperar Formulario(entrada) por ID.
 - [x] Insertar nuevos Formulario(entrada) dentro de la base de datos.
 - [x] Borrar Formulario(entrada) de la base de datos.
 - [ ] Actualizar información de un formulario(entrada) existente.
 - [x] Recuperar set de datos de formulario por ID de entrada.
 - [x] Recuperar entrada por ID de un set de datos.
 - [x] Insertar entrada para un set de datos.
 - [x] Borrar entrada de un set de datos.
 - [ ] Actualizar información de una entrada de un set de datos existente.
 - [x] Incluir plantilla Twig(GUI) para controlar el modulo.
 - [x] *Twig* | Insertar set de datos a un Formulario.
 - [ ] *Twig* | Mostrar lista de Formularios por usuario.
 - [ ] *Twig* | Mostrar lista de todos los Formularios .
 - [ ] *Twig* | Borrar Formulario.
 - [ ] *Twig* | Insertar Formulario.
 - [ ] *Twig* | Editar Formulario.
 - [ ] *Twig* | Buscador de Formulario.
 - [ ] *Twig* | Filtros para Formularios.
 - [ ] Editar Formulario de la base de datos.
 - [ ] Editar set de datos de un formulario en la base de datos.
 - [ ] Recuperar lista de Formularios por usuario.
 - [ ] Recuperar lista de Formularios por nombre.
 - [ ] Recuperar lista de Formularios por fecha de adición.
 - [ ] Recuperar lista de Formularios por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de Formulario | Formato 13.  
> *Permite controlar Formulario 13 dentro del framework*

 - [ ] Estructura SQL básica para el Formato.
 - [ ] Crear clases PHP para trabajar con objetos del Formato dentro del framework.
 - [ ] Crear clases PHP para trabajar con set de datos de un formulario.
 - [ ] Recuperar una lista de todas los Formatos(entrada) de la base datos.
 - [ ] Recuperar Formulario(entrada) por ID.
 - [ ] Insertar nuevos Formulario(entrada) dentro de la base de datos.
 - [ ] Borrar Formulario(entrada) de la base de datos.
 - [ ] Actualizar información de un formulario(entrada) existente.
 - [ ] Recuperar set de datos de formulario por ID de entrada.
 - [ ] Recuperar entrada por ID de un set de datos.
 - [ ] Insertar entrada para un set de datos.
 - [ ] Borrar entrada de un set de datos.
 - [ ] Actualizar información de una entrada de un set de datos existente.
 - [ ] Incluir plantilla Twig(GUI) para controlar el modulo.
 - [ ] *Twig* | Insertar set de datos a un Formulario.
 - [ ] *Twig* | Mostrar lista de Formularios por usuario.
 - [ ] *Twig* | Mostrar lista de todos los Formularios .
 - [ ] *Twig* | Borrar Formulario.
 - [ ] *Twig* | Insertar Formulario.
 - [ ] *Twig* | Editar Formulario.
 - [ ] *Twig* | Buscador de Formulario.
 - [ ] *Twig* | Filtros para Formularios.
 - [ ] Editar Formulario de la base de datos.
 - [ ] Editar set de datos de un formulario en la base de datos.
 - [ ] Recuperar lista de Formularios por usuario.
 - [ ] Recuperar lista de Formularios por nombre.
 - [ ] Recuperar lista de Formularios por fecha de adición.
 - [ ] Recuperar lista de Formularios por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.

> Modulo de Formulario | Formato 14.  
> *Permite controlar Formulario 14 dentro del framework*

 - [x] Estructura SQL básica para el Formato.
 - [ ] Crear clases PHP para trabajar con objetos del Formato dentro del framework.
 - [ ] Crear clases PHP para trabajar con set de datos de un formulario.
 - [ ] Recuperar una lista de todas los Formatos(entrada) de la base datos.
 - [ ] Recuperar Formulario(entrada) por ID.
 - [ ] Insertar nuevos Formulario(entrada) dentro de la base de datos.
 - [ ] Borrar Formulario(entrada) de la base de datos.
 - [ ] Actualizar información de un formulario(entrada) existente.
 - [ ] Recuperar set de datos de formulario por ID de entrada.
 - [ ] Recuperar entrada por ID de un set de datos.
 - [ ] Insertar entrada para un set de datos.
 - [ ] Borrar entrada de un set de datos.
 - [ ] Actualizar información de una entrada de un set de datos existente.
 - [x] Incluir plantilla Twig(GUI) para controlar el modulo.
 - [ ] *Twig* | Insertar set de datos a un Formulario.
 - [ ] *Twig* | Mostrar lista de Formularios por usuario.
 - [ ] *Twig* | Mostrar lista de todos los Formularios .
 - [ ] *Twig* | Borrar Formulario.
 - [ ] *Twig* | Insertar Formulario.
 - [ ] *Twig* | Editar Formulario.
 - [ ] *Twig* | Buscador de Formulario.
 - [ ] *Twig* | Filtros para Formularios.
 - [ ] Editar Formulario de la base de datos.
 - [ ] Editar set de datos de un formulario en la base de datos.
 - [ ] Recuperar lista de Formularios por usuario.
 - [ ] Recuperar lista de Formularios por nombre.
 - [ ] Recuperar lista de Formularios por fecha de adición.
 - [ ] Recuperar lista de Formularios por fecha de edición.
 - [ ] Integrar modulo de advertencias(*warnings*) en el modulo.
 - [ ] Integrar modulo de errores en el modulo.
 - [ ] Integrar modulo *Logger* dentro del modulo.
 - [ ] Documentar modulo.