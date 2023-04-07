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

        

        return 1;
    }
}