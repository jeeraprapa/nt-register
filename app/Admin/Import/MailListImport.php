<?php

namespace App\Admin\Import;

use App\Domain\Mail\MailList;
use Maatwebsite\Excel\Concerns\ToModel;

class MailListImport implements ToModel
{

    public function model (array $row)
    {
        return new MailList([
            'mail_group_id' => $row[0],
            'first_name'    => $row[1],
            'last_name'     => $row[2],
            'email'         => $row[3],
            'account'       => $row[4],
            'department'    => $row[5]
        ]);
    }
}
