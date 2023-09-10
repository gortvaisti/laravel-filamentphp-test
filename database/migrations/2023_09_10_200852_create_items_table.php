<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('condition', ['új', 'használt']);
            $table->string('color');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
