<?php
namespace app\controllers\transaction;

use Flight;
use app\models\transaction\Transaction;

class TransactionController {

    public static function getAll() {
        $data = Transaction::getAll();
        Flight::json($data);
    }

    public static function getOne($id) {
        $data = Transaction::getOne((int)$id);
        if ($data) {
            Flight::json($data);
        } else {
            Flight::halt(404, "Transaction not found");
        }
    }

    public static function create() {
        $data = Flight::request()->data->getData();
        $id = Transaction::create($data);
        Flight::json(['id' => $id], 201);
    }

    public static function update($id) {
        $data = Flight::request()->data->getData();
        $success = Transaction::update((int)$id, $data);
        if ($success) {
            Flight::json(['message' => 'Transaction updated']);
        } else {
            Flight::halt(404, "Transaction not found or not updated");
        }
    }

    public static function delete($id) {
        $success = Transaction::delete((int)$id);
        if ($success) {
            Flight::json(['message' => 'Transaction deleted']);
        } else {
            Flight::halt(404, "Transaction not found");
        }
    }
}
