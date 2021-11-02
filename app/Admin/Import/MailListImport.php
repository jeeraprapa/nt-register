<?php

namespace App\Admin\Import;

use App\Domain\Mail\MailList;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class MailListImport implements ToModel,WithChunkReading, ShouldQueue, WithStartRow, SkipsOnFailure, WithValidation
{

    public function model (array $row)
    {
        return new MailList([
            'mail_group_id' => $row[0],
            'first_name'    => $row[1],
            'last_name'     => $row[2],
            'email'         => $row[3],
            'account'       => Arr::get($row, 4, null),
            'department'    => Arr::get($row, 5, null),
        ]);
    }

    public function chunkSize (): int
    {
        return 100;
    }

    public function startRow (): int
    {
        return 2;
    }

    public function onFailure (Failure ...$failures)
    {
        \Log::error($failures);
    }

    public function rules (): array
    {
        return [
            '0' => 'required|numeric',
            '1' => 'required|string',
            '2' => 'required|string',
            '3' => 'required|string'
        ];
    }
}
