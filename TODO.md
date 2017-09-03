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
 - [ ] Documentar modulo.