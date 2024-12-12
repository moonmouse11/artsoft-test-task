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
        Schema::create(table: 'programs', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title')->nullable(value: false);
            $table->double(column: 'interest_rate')->nullable(value: false);
            $table->json(column: 'rule')->nullable(value: true);
            $table->integer(column: 'monthly_payment')->nullable(value: true);
            $table->softDeletes();
        });

        Schema::create(table: 'credit_requests', callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'program_id')->nullable(value: false)
                ->references(column: 'id')->on(table: 'programs')->restrictOnDelete();
            $table->foreignId(column: 'car_id')->nullable(value: false)
                ->references(column: 'id')->on(table: 'cars')->restrictOnDelete();
            $table->integer(column: 'initial_payment')->nullable(value: false);
            $table->integer(column: 'loan_term')->nullable(value: false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'credit_requests');
        Schema::dropIfExists(table: 'programs');
    }
};
