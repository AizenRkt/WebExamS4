<?php
namespace app\models\transaction;

use Flight;
use PDO;

class Transaction {

    protected static string $view = 'vue_transaction_detaillee';

    // Récupère toutes les transactions enrichies
    public static function getAll() {
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM " . self::$view);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère tous les détails pour une transaction spécifique
    public static function getByTransactionId($id) {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM " . self::$view . " WHERE transaction_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère les détails de transaction pour un client donné
    public static function getByClientId($clientId) {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM " . self::$view . " WHERE client_id = ?");
        $stmt->execute([$clientId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère toutes les lignes avec un statut donné
    public static function getByStatus($status) {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM " . self::$view . " WHERE status = ?");
        $stmt->execute([$status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
