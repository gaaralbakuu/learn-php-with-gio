<?php

namespace App\Controllers;

use App\App;

class Home
{
    public function index(): View
    {
        $db = App::db();

        try {
            $db->beginTransaction();

            $stmt = $db->prepare("INSERT INTO users(username, password, salt) VALUES (?, ?, ?)");

            $stmt->execute(["gaaralbakuu", "123456", "salt"]);

            echo $db->lastInsertId();

            $db->commit();
        }catch (\Throwable $e){
            if($db->inTransaction()){
                $db->rollBack();
            }

            throw $e;
        }
        return View::make("index");
    }
}