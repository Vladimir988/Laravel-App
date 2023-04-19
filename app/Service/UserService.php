<?php

namespace App\Service;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store($data): void
    {
        try {
            DB::beginTransaction();
            $data['password'] = Hash::make($data['password']);
            User::firstOrCreate(['email' => $data['email']], $data);
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
