<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
            $table->foreignId('pourashava_admin_id')->constrained('admins')->cascadeOnDelete();
            $table->foreignId('vehicle_type_id')->nullable()->constrained('vehicle_types');
            $table->unsignedBigInteger('registration_no')->nullable()->unique();
            $table->string('card_no')->unique()->nullable();
            $table->string('pin_no')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
           
            $table->string('picture')->nullable();
            $table->string('father_or_husband_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->unsignedBigInteger('nid_no')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender');
            $table->foreignId('pourashava_id')->constrained('pourashavas')->cascadeOnDelete();
            $table->unsignedInteger('post_code')->nullable();
            $table->foreignId('ward_id')->nullable()->constrained('ward_numbers')->cascadeOnDelete();

            $table->foreignId('village_id')->nullable()->constrained('villages')->cascadeOnDelete();
            

            
            $table->string('permanent_address');
            $table->string('present_address')->nullable();
            $table->timestamp('valid_to')->nullable()->comment('account validation end date');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
