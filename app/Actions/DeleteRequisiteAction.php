<?php

namespace App\Actions;

use App\Models\Requisite;

class DeleteRequisiteAction extends Action
{

    public function __invoke($data)
    {
        $data->delete();

        return $this->trueresponse('Успех');
    }
}
