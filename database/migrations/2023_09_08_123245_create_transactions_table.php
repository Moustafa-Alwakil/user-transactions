<?php

use App\Enums\TransactionStatusCodeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->decimal('paid_amount');
            $table->string('currency', 3);
            $table->string('parent_email');
            $table->enum('status_code', array_column(TransactionStatusCodeEnum::cases(), 'value'));
            $table->date('payment_date');
            $table->string('parent_identification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
