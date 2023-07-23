<?php

namespace App\Actions;

use App\Models\User;

class UpdateUserAction extends Action
{

    public function __invoke(User $user, $data)
    {
        $user->update($data);
        return $this->trueresponse('Успех');
    }
}
