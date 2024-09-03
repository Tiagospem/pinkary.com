<?php

declare(strict_types=1);

use App\Models\Hashtag;
use App\Models\Question;
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
        Schema::create('hashtags', function (Blueprint $table): void {
            $table->id();
            $table->string('name')->unique()->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });

        Schema::create('hashtag_question', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('hashtag_id')->constrained()->cascadeOnDelete();

            $table->uuid('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->cascadeOnDelete();

            $table->unique(['hashtag_id', 'question_id']);
        });
    }
};
