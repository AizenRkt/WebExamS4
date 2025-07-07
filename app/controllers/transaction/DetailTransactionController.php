<?php
namespace app\controllers\transaction;

use Flight;
use app\models\transaction\DetailTransaction;

class DetailTransactionController {

    public static function getAll() {
        $data = DetailTransaction::getAll();
        Flight::json($data);
    }

    public static function getOne($id) {
        $data = DetailTransaction::getOne((int)$id);
        if ($data) {
            Flight::json($data);
        } else {
            Flight::halt(404, "Detail transaction not found");
        }
    }

    public static function create() {
        $data = Flight::request()->data->getData();
        $id = DetailTransaction::create($data);
        Flight::json(['id' => $id], 201);
    }

    public static function update($id) {
        $data = Flight::request()->data->getData();
        $success = DetailTransaction::update((int)$id, $data);
        if ($success) {
            Flight::json(['message' => 'Detail transaction updated']);
        } else {
            Flight::halt(404, "Detail transaction not found or not updated");
        }
    }

    public static function delete($id) {
        $success = DetailTransaction::delete((int)$id);
        if ($success) {
            Flight::json(['message' => 'Detail transaction deleted']);
        } else {
            Flight::halt(404, "Detail transaction not found");
        }
    }
}
