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
        Schema::create('portofolio', function (Blueprint $table) {
            $table->id();
            $table->string('client'); 
            $table->string('category'); 
            $table->text('image'); 
            $table->string('slug')->unique(); 
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
            $table->timestamps(); 
            $table->softDeletes(); 
            $table->integer('deleted_by')->default(0); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};