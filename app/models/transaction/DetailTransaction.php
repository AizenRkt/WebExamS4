<?php
namespace app\models\transaction;

use Flight;
use PDO;

class DetailTransaction {
    protected static string $table = 'detail_transaction';

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
        $sql = "INSERT INTO " . self::$table . " (id_transaction, date, montant) VALUES (?, COALESCE(?, CURRENT_TIMESTAMP), ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $data['id_transaction'],
            $data['date'] ?? null,
            $data['montant']
        ]);
        return $db->lastInsertId();
    }

    public static function update(int $id, array $data) {
        $db = Flight::db();
        $sql = "UPDATE " . self::$table . " SET id_transaction = ?, date = COALESCE(?, date), montant = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            $data['id_transaction'],
            $data['date'] ?? null,
            $data['montant'],
            $id
        ]);
    }

    public static function delete(int $id) {
        $db = Flight::db();
        $stmt = $db->prepare("DELETE FROM " . self::$table . " WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
