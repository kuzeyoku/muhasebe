<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number')->unique();
            $table->bigInteger("access_number")->nullable();
            $table->string("group")->nullable();
            $table->enum("type", \App\Enums\LicenceTypeEnum::getValues())->nullable();
            $table->unsignedBigInteger("company_id")->nullable();
            $table->foreign("company_id")->references("id")->on("companies");
            $table->unsignedBigInteger("city_id")->nullable();
            $table->foreign("city_id")->references("id")->on("cities");
            $table->unsignedBigInteger("district_id")->nullable();
            $table->foreign("district_id")->references("id")->on("districts");
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licences');
    }
};
