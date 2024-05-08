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

        // CMS
        // Configuración
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Categorias
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Menus
        Schema::create('menu_position', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('order');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('menu_position');
            $table->foreign('parent_id')->references('id')->on('menus');
        });

        // Paginas
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('identifier',50);
            $table->string('title',50);
            $table->unsignedBigInteger('category_id');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::create('menu_page_relations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('page_id');
            $table->tinyInteger('is_active')->default(1);
            $table->integer('order')->default(0);

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });


        // Tienda
        Schema::create('molds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('model');
            $table->string('image');
            $table->string('materials');
            $table->string('applications');
            $table->boolean('activated');
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
        });

        /*

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->text('description');
            $table->unsignedBigInteger('type');
            $table->decimal('price',10,2)->default(0.00);
            $table->integer('stock');
            $table->boolean('extern');
            $table->boolean('available');
            //$table->integer('')
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('molds');
        Schema::dropIfExists('menu_page_relations');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_position');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('configurations');
    }
};
