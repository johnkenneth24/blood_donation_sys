<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->string('email');
            $table->string('address');
            $table->string('contact_no');
            $table->string('blood_type')->nullable();
            $table->string('gender');
            $table->string('age');
            $table->string('bdate');
            $table->string('status')->default('pending');
            $table->string('bag_blood')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donors');
    }
};
