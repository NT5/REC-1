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
            'icon' => 'assignment_turned_in',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => '#',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'formato8' => [
            'title' => 'Formato 8',
            'icon' => 'assignment_turned_in',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => '#',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'formato9' => [
            'title' => 'Formato 9',
            'icon' => 'assignment_turned_in',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => '#',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'formato10' => [
            'title' => 'Formato 10',
            'icon' => 'assignment_turned_in',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => '#',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'formato11' => [
            'title' => 'Formato 11',
            'icon' => 'assignment_turned_in',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => '#',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'formato12' => [
            'title' => 'Formato 12',
            'icon' => 'assignment_turned_in',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => '#',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'formato13' => [
            'title' => 'Formato 13',
            'icon' => 'assignment_turned_in',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => '#',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
        ],
        'formato14' => [
            'title' => 'Formato 14',
            'icon' => 'assignment_turned_in',
            'content' => 'I am a very simple card. I am good at containing small bits of information.',
            'url' => '#',
            'help' => 'Here is some more information about this product that is only revealed once clicked on.'
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
