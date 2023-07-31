<?php

namespace App\Actions;

use App\Models\Requisite;

class DeleteWithdrawMethodAction extends Action
{

    public function __invoke($data)
    {
        $data->delete();

        return $this->trueresponse('Успех');
    }
}
