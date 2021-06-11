<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccountRenewFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_account_renew_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
            $table->timestamp('valid_from')->nullable()->comment('validation start date');
            $table->timestamp('valid_to')->nullable()->comment('validation end date');
            $table->string('transaction_id');
            $table->string('pay_from')->comment('mobile number who will be send payment');
            $table->string('pay_to')->comment('mobile number who will be receive payment');
            $table->double('amount');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_account_renew_fees');
    }
}
