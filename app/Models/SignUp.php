<?php

namespace App\Models;

class SignUp{
    public function __construct(protected User $userModel, protected UserInfo $userInfoModel)
    {
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