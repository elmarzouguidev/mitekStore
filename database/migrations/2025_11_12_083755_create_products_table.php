<?php

use App\Models\Catalog\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();

            $table->foreignIdFor(Category::class)->index()->nullable()->constrained()->nullOnDelete();

            $table->activeFields();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
