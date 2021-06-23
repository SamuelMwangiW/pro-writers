<?php

namespace App\Actions\Order;

use App\Exceptions\OrderCreationException;
use App\Models\Order;
use App\Models\User;

class CreateNewDraftOrder
{
    public static function create(User $user, array $data): Order
    {
        return $user->orders()->create($data);
    }
}
