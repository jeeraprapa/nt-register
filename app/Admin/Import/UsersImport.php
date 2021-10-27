<?php

namespace App\Admin\Import;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{

    public function model (array $row)
    {
        return new User([
            'name'     => $row[0],
            'email'    => $row[1]
        ]);
    }
}
