<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            if(isset($item['name']) && $item['name'] && isset($item['email']) && $item['email']) {
                User::firstOrCreate([
                    'email' => $item['email'],
                ], [
                    'name'     => $item['name'],
                    'email'    => $item['email'],
                    'password' => md5($item['password']),
                    'role'     => $item['role'],
                ]);
            }
        }
    }
}
