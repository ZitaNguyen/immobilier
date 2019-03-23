<?php

function addAnnonce($titre, $rue, $ville, $cp, $surface, $prix, $image, $type, $description) {
    
    global $db;

    $query = $db->prepare('
        INSERT INTO logement (`titre`, `rue`, `ville`, `cp`, `surface`, `prix`, `image`, `type`, `description`)
        VALUES (:titre, :rue, :ville, :cp, :surface, :prix, :image, :type, :description)
    ');

    $query->bindValue(':titre', $titre, PDO::PARAM_STR);
    $query->bindValue(':rue', $rue, PDO::PARAM_STR);
    $query->bindValue(':ville', $ville, PDO::PARAM_STR);
    $query->bindValue(':cp', $cp, PDO::PARAM_INT);
    $query->bindValue(':surface', $surface, PDO::PARAM_INT);
    $query->bindValue(':prix', $prix, PDO::PARAM_INT);
    $query->bindValue(':image', $image, PDO::PARAM_STR);
    $query->bindValue(':type', $type, PDO::PARAM_STR);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    

    return $query->execute();
}    