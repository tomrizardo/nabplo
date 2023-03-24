<?php

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
        Schema::create('participants', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('ref_no', 20);
            $table->string('last_name', 180);
            $table->char('ext_name', 10);
            $table->string('first_name', 180);
            $table->string('mid_name', 180)->nullable();
            $table->string('email')->unique();
            $table->string('contact_no', 15);
            $table->string('position', 30)->nullable();
            $table->string('department', 30)->nullable();

            $table->text('reciept_filename', 255)->nullable();
            $table->string('addr_municipality', 100)->nullable();
        
    
            
            $table->string('validation_status', 120)->nullable();
            $table->text('validation_remarks')->nullable();
            $table->dateTime('validation_datetime')->nullable();
            $table->integer('validate_by_staff_id')->nullable();
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
        Schema::dropIfExists('participants');
    }
};
