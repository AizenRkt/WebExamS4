<?php
namespace app\models\transaction;

use Flight;
use PDO;

class Transaction {
    protected static string $table = 'transaction';

    public static function getAll() {
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM " . self::$table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getOne(int $id) {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM " . self::$table . " WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create(array $data) {
        $db = Flight::db();
        $sql = "INSERT INTO " . self::$table . " (date, montant, id_type_transaction, id_client) VALUES (COALESCE(?, CURRENT_TIMESTAMP), ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $data['date'] ?? null,
            $data['montant'],
            $data['id_type_transaction'],
            $data['id_client']
        ]);
        return $db->lastInsertId();
    }

    public static function update(int $id, array $data) {
        $db = Flight::db();
        $sql = "UPDATE " . self::$table . " SET date = COALESCE(?, date), montant = ?, id_type_transaction = ?, id_client = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            $data['date'] ?? null,
            $data['montant'],
            $data['id_type_transaction'],
            $data['id_client'],
            $id
        ]);
    }

    public static function delete(int $id) {
        $db = Flight::db();
        $stmt = $db->prepare("DELETE FROM " . self::$table . " WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
