<?php

namespace REC1\Pages\Home;

/**
 * 
 */
class Cards {

    /**
     *
     * @var array 
     */
    private static $Vars = [
        // Title card
        'user' => [
            'title' => 'Usuarios',
            'icon' => 'account_box',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'link' => [
                'url' => 'user/',
                'title' => 'Administrar usuarios'
            ],
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'admin' => [
            'title' => 'Administracion',
            'icon' => 'build',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'link' => [
                'url' => 'page',
                'title' => 'Configuracion de la pagina'
            ],
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        // Horizontal card
        'carreras' => [
            'title' => 'Carreras',
            'icon' => 'directions_run',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => 'formato/carreras/',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'peds' => [
            'title' => 'Peds',
            'icon' => 'business',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => 'formato/peds/',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'turnos' => [
            'title' => 'Turnos',
            'icon' => 'donut_small',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => 'formato/turnos/',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        // Normal card
        'formato7' => [
            'title' => 'Formato 7',
            'icon' => 'gradient',
            'color' => 'purple accent-1',
            'content' => 'Matriculados por sede, turno, carrera, año, sexo y procedencia',
            'url' => 'formato/7/',
            'help' => 'En el orden de las casillas, se debe sumar el total de varones de cada carrera, el total de varones de procedencia urbana o rural, igual mente se debe aplicar esta lógica para las mujeres.'
        ],
        'formato8' => [
            'title' => 'Formato 8',
            'icon' => 'group',
            'color' => ' blue accent-1',
            'content' => 'Matriculados por sede, turno, carrera, año y grupos de edad',
            'url' => 'formato/8/',
            'help' => 'Los rangos de edad fueron tomados de las estadísticas gubernamentales de las universidades Españolas'
        ],
        'formato9' => [
            'title' => 'Formato 9',
            'icon' => 'import_contacts',
            'color' => 'teal accent-1',
            'content' => 'Matriculados por sede, turno, carrera, año y filiación religiosa',
            'url' => 'formato/9/',
            'help' => 'Estudiantes matriculados por sede, turno, carrera, año y filiación religiosa'
        ],
        'formato10' => [
            'title' => 'Formato 10',
            'icon' => 'insert_chart',
            'color' => 'lime accent-1',
            'content' => 'Porcentaje de retención y deserción de estudiantes',
            'url' => 'formato/10/',
            'help' => 'Porcentaje de retención y deserción por sede, turno, carrera y año.'
        ],
        'formato11' => [
            'title' => 'Formato 11',
            'icon' => 'school',
            'color' => 'deep-orange accent-1',
            'content' => 'Rendimiento académico por sede, turno, carrera...',
            'url' => 'formato/11/',
            'help' => 'Rendimiento académico por sede, turno, carrera, año, sexo y procedencia. Se debe tener el rendimiento de cada estudiante. Rendimiento académico por año de cada carrera. Rendimiento promedio por carrera. Rendimiento promedio de todas las carreras.'
        ],
        'formato12' => [
            'title' => 'Formato 12',
            'icon' => 'flare',
            'color' => 'yellow lighten-2',
            'content' => 'Se deben reflejar los estudiantes reprobados en el trimestre.',
            'url' => 'formato/12/',
            'help' => 'En el cuadro siguiente solo, se deben reflejar los estudiantes reprobados en el trimestre, a fin de que los responsables de carrera o las subdirecciones académicas implementen planes de remediales con los mismos de manera personalizada.'
        ],
        'formato13' => [
            'title' => 'Formato 13',
            'icon' => 'add_to_photos',
            'color' => 'red lighten-5',
            'content' => 'Estudiantes matriculados por sedes, carreras y sexo. ',
            'url' => 'formato/13/',
            'help' => 'Se suman de forma vertical los totales de varones y mujeres para tener el dato global]; asimismo, se suman horizontalmente los datos por carrera y los totales.'
        ],
        'formato14' => [
            'title' => 'Formato 14',
            'icon' => 'equalizer',
            'color' => 'indigo accent-1',
            'content' => 'Formulario de Eficiencia terminal por sedes, carreras y cohorte',
            'url' => 'formato/14/',
            'help' => 'Una cohorte es para este caso, un grupo de estudiantes que ingresaron en el mismo año lectivo y del que se estudia el comportamiento académico a lo largo de los años que dura su carrera'
        ]
    ];

    /**
     * 
     * @return array
     */
    public static function getVars() {
        return self::$Vars;
    }

}
