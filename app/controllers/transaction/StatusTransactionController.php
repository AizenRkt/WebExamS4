<?php
namespace app\controllers\transaction;

use Flight;
use app\models\transaction\StatusTransaction;

class StatusTransactionController {

    public static function getAll() {
        $data = StatusTransaction::getAll();
        Flight::json($data);
    }

    public static function getOne($id) {
        $data = StatusTransaction::getOne((int)$id);
        if ($data) {
            Flight::json($data);
        } else {
            Flight::halt(404, "Status transaction not found");
        }
    }

    public static function create() {
        $data = Flight::request()->data->getData();
        $id = StatusTransaction::create($data);
        Flight::json(['id' => $id], 201);
    }

    public static function update($id) {
        $data = Flight::request()->data->getData();
        $success = StatusTransaction::update((int)$id, $data);
        if ($success) {
            Flight::json(['message' => 'Status transaction updated']);
        } else {
            Flight::halt(404, "Status transaction not found or not updated");
        }
    }

    public static function delete($id) {
        $success = StatusTransaction::delete((int)$id);
        if ($success) {
            Flight::json(['message' => 'Status transaction deleted']);
        } else {
            Flight::halt(404, "Status transaction not found");
        }
    }
}
