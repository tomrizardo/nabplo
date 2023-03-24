<?php

namespace App\Http\Controllers\Settings;

trait Forms {

    public $ext_names = ['NONE', 'I', 'II', 'III', 'IV', 'V', 'JR', 'SR'];

    public $barangay = [
        'BACLARAN', 'BF HOMES', 'DON BOSCO', 'DON GALO', 'LA HUERTA', 'MARCELO GREEN', 'MERVILLE', 'MOONWALK', 'SAN ANTONIO', 'SAN DIONISIO', 'SAN ISIDRO', 'SAN MARTIN DE PORRES', 'STO. NINO', 'SUN VALLEY', 'TAMBO', 'VITALEZ',
    ];

    public $address_convention = ['STREET', 'ROAD', 'AVENUE', 'BOULEVARD', 'EXTENSION', 'OTHERS'];

    public $relation = [
        "DAUGHTER", "SON", "FATHER", "MOTHER", "WIFE", "HUSBAND",
    ];
    
}
