<?php
namespace app\models;

use Flight;
use PDO;

class Etudiant {

    public static function getAll() {
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM etudiant");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM etudiant WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Flight::db();
        $stmt = $db->prepare("INSERT INTO etudiant (nom, prenom, email, age) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data->nom, $data->prenom, $data->email, $data->age]);
        return $db->lastInsertId();
    }

    public static function update($id, $data) {
        $db = Flight::db();
        $stmt = $db->prepare("UPDATE etudiant SET nom = ?, prenom = ?, email = ?, age = ? WHERE id = ?");
        $stmt->execute([$data->nom, $data->prenom, $data->email, $data->age, $id]);
    }

    public static function delete($id) {
        $db = Flight::db();
        $stmt = $db->prepare("DELETE FROM etudiant WHERE id = ?");
        $stmt->execute([$id]);
    }
}
