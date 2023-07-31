<?php

namespace App\Actions;

use App\Models\Requisite;

class CreateRequisiteAction extends Action
{

    public function __invoke($data)
    {
        Requisite::create($data);

        return $this->trueresponse('Успех');
    }
}
