<?php

namespace App\Actions;

use App\Models\Requisite;
use App\Models\WithdrawMethod;

class CreateWithdrawMethodAction extends Action
{

    public function __invoke($data)
    {
        WithdrawMethod::create($data);

        return $this->trueresponse('Успех');
    }
}
