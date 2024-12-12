<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'brands', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 255)->nullable(value: false);
            $table->softDeletes();
        });

        Schema::create(table: 'models', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 255)->nullable(value: false);
            $table->softDeletes();
        });

        Schema::create(table: 'cars', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'photo', length: 255);
            $table->foreignId(column: 'brand_id')->references(column: 'id')->on(table: 'brands')->restrictOnDelete();
            $table->foreignId(column: 'model_id')->references(column: 'id')->on(table: 'models')->restrictOnDelete();
            $table->integer(column: 'price')->nullable(value: false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'cars');
        Schema::dropIfExists(table: 'brands');
        Schema::dropIfExists(table: 'models');
    }
};
