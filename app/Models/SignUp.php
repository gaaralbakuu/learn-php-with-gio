<?php

namespace App\Models;

use App\Model;

class SignUp extends Model implements SignUpInterface{
    public function __construct(protected User $userModel, protected UserInfo $userInfoModel)
    {
        parent::__construct();
    }

    /**
     * @throws \Throwable
     */
    public function register(array $user, array $userInfo): int{


        try {
            $this->db->beginTransaction();

            $userId = $this->userModel->create($user["username"], $user["password"], $user["salt"]);
            $userInfoId = $this->userInfoModel->create($userId, $userInfo["name"], $userInfo["gender"]);

            $this->db->commit();
        } catch (\Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            throw $e;
        }

        return $userInfoId;
    }
}