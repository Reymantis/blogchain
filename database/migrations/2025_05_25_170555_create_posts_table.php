<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->unique()->index();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Category::class);
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->boolean('live')->default(false);
            $table->timestamp('approved_at')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
