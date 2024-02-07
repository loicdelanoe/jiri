<?php

$jiris = [
    ['id' => '1', 'name' => 'Projet Web 2025', 'date' => '2019-12-01'],
    ['id' => '4', 'name' => 'Projet Web 2024', 'date' => '2025-01-27'],
    ['id' => '78', 'name' => 'Design Web 2023', 'date' => '2003-09-12'],
    ['id' => '99', 'name' => 'Design Web 2024', 'date' => '2024-03-04'],
    ['id' => '9', 'name' => 'Design Web 2026', 'date' => '2026-05-04'],
    ['id' => '90', 'name' => 'Design Web 2029', 'date' => '2029-05-04'],
    ['id' => '80', 'name' => 'Design Web 2000', 'date' => '2000-05-04'],
];


// Si TIMESTAMP de la date du jiri supérieur à la date d'aujourd'hui alors le jiri est à venir,
// Sinon le jiri est passé et archivé.
// 1. Convertir date en TIMESTAMP pour chaque jiri.
// 2. Obtenir la date d'aujourd'hui en TIMESTAMP,
// 3. Comparer les valeurs et les push dans leur array respectives.

//function filterByDate($jiris)
//{
//    $upcoming_jiris = [];
//    $passed_jiris = [];
//
//    foreach ($jiris as $jiri) {
//        if (strtotime($jiri['date']) > time()) {
//            $upcoming_jiris[] = $jiri;
//        } else {
//            $passed_jiris[] = $jiri;
//        }
//    }
//
//    return [
//        'upcoming' => $upcoming_jiris,
//        'passed' => $passed_jiris,
//    ];
//}


$upcoming_jiris = array_filter($jiris, function ($jiri) {
    return strtotime($jiri['date']) > time();
});

$passed_jiris = array_filter($jiris, function ($jiri) {
    return strtotime($jiri['date']) < time();
});


// Filtrage des jiris globaux en fonction de la date
//$upcoming_jiris = [$jiris[0], $jiris[1],];
//$passed_jiris = [$jiris[2], $jiris[3],];

require 'index.view.php';