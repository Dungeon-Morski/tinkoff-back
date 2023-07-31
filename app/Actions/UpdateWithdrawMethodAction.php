<?php

namespace App\Actions;

use App\Models\User;
use App\Models\WithdrawMethod;

class UpdateWithdrawMethodAction extends Action
{

    public function __invoke(WithdrawMethod $method, $data)
    {
        $method->update($data);
        return $this->trueresponse('Успех');
    }
}
