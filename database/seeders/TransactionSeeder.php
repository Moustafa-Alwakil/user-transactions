<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $decodedJson = json_decode(file_get_contents('database/seeders/transactions.json'));

        foreach ($decodedJson->transactions as  $transaction) {
            Transaction::query()->create([
                'paid_amount' => $transaction->paidAmount,
                'currency' => $transaction->Currency,
                'parent_email' => $transaction->parentEmail,
                'status_code' => $transaction->statusCode,
                'payment_date' => $transaction->paymentDate,
                'parent_identification' => $transaction->parentIdentification,
            ]);
        }
    }
}
