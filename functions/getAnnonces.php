<?php

function getAnnonces() {

    global $db;

    $query = $db->query('SELECT * FROM logement');

    return $query->fetchAll();

}

