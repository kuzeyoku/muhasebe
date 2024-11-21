<?php

use App\Enums\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("slug");
            $table->string("title");
            $table->text("content")->nullable();
            $table->integer("category_id")->nullable()->default(0);
            $table->json("tags")->nullable();
            $table->integer("view_count")->default(0);
            $table->integer("like_count")->default(0);
            $table->enum("status", StatusEnum::getValues())->default(StatusEnum::Active->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
