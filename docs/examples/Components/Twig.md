## Creación de objeto Twig ##
$Twig = new \REC1\Components\Twig();
No requiere compontes adicionales. 

## Métodos ##

> $Twig->setTemplate($template);

$Twig = new \REC1\Components\Twig();

**Carga de plantilla Twig en directorio raíz**
$Twig->setTemplate('home.twig');

**Carga de plantilla Twig en subdirectorios**
$Twig->setTemplate('pages/home.twig');

> $Twig->addFilter($filter_name, $filter_function);

**Filtro Personalizado de la función date**
$Twig->addFilter('date', function ($timestamp, $format = 'F j, Y H:i') {
    // do something different from the built-in date filter
}));

> $Twig->setVar($name, $value);

**Agrega variables al modulo**
$Twig->setVar('foo', 'bar');

**Agrega variable multidimensional**
$Twig->setVar('foo.bar', 'foo');

**Agrega un arreglo como variable**
$Twig->setVar('foo', array('foo' => 'bar'));

> $Twig->setVars(array $vars);

$Twig->setVars(array(
	'foo' => 'bar',
	'bar' => 'foo',
	'a' => array(
            'b' => 'c'
	)
));

> $Twig->getVar($name);

**Regresa el valor de la variable foo**
$Twig->getVar('foo');

**Regresa el valor de la varible foo.bar**
$Twig->getVar('foo.bar');

> $Twig->getRender();
echo $Twig->getRender();