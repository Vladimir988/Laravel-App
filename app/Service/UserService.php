<?php

namespace App\Service;

use App\Jobs\StoreUserJob;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function store($data): void
    {
        try {
            DB::beginTransaction();
            StoreUserJob::dispatch($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, User $user): User
    {
        try {
            DB::beginTransaction();
            $user->update($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $user;
    }
}
