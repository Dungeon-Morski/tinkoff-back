<?php

namespace App\Actions;

use App\Models\Requisite;

class UpdateRequisiteAction extends Action
{

    public function __invoke(Requisite $requisite, $data)
    {
        $requisite->update($data);
        return $this->trueresponse('Успех');
    }
}
