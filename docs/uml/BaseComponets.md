```plantuml
Class BaseComponents {
..Variables..
- \REC1\Util\Logger Logger Objeto con métodos usados en el registro de seguimiento
- \REC1\Warning\WarningSet WarningSet Set con advertencias que puede generar la pagina
- \REC1\Error\ErrorSet ErrorSet Set con errores que puede generar la pagina
..Recuperadores..
+ getLogger()
+ getErrorSet()
+ getWarningSet()
..Asignadores..
+ setLog()
+ addError()
+ addError()
}
```