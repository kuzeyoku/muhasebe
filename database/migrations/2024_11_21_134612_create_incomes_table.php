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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("company_id")->nullable();
            $table->foreign("company_id")->references("id")->on("companies");
            $table->unsignedBigInteger("licence_id")->nullable();
            $table->foreign("licence_id")->references("id")->on("licences");
            $table->enum("income_type", \App\Enums\IncomeType::getValues())->default(\App\Enums\IncomeType::Other);
            $table->integer("amount")->nullable();
            $table->date("date")->nullable();
            $table->string("status")->nullable();
            $table->string("description")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};