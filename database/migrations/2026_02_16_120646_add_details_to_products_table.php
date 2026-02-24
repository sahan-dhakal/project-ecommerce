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
        Schema::table('products', function (Blueprint $table) {
            $table-> foreignId('supplier_id')
            ->nullable()
            ->after('category_id') // place the supplier_id column after category_id for better organization
            ->constrained('suppliers')//create a foreign key constraint referencing the suppliers table
            ->onDelete('set null'); // if a supplier is deleted, set the supplier_id to null in the products table

            $table->integer('stock_quantity')->default(0)->after('price'); // add stock_quantity column after price with a default value of 0
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
