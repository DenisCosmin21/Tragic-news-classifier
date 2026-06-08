<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('domain_scores', function (Blueprint $table) {
            $table->bigInteger('domain_id')
                ->unique()
                ->autoIncrement();

            $table->string('domain_name', 64);

            $table->decimal('score', 8, 2);

            $table->index('domain_name')->algorithm('hash');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_scores');
    }
};
