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
        Schema::table('home_contents', function (Blueprint $table) {
            // Brand Logo 1 (Apparel)
            $table->string('brand_logo1_image')->nullable()->after('about_description');
            $table->string('brand_logo1_name')->default('Apparel')->after('brand_logo1_image');
            // Brand Logo 2 (Design)
            $table->string('brand_logo2_image')->nullable()->after('brand_logo1_name');
            $table->string('brand_logo2_name')->default('Design')->after('brand_logo2_image');
            // Brand Logo 3 (Decor)
            $table->string('brand_logo3_image')->nullable()->after('brand_logo2_name');
            $table->string('brand_logo3_name')->default('Decor')->after('brand_logo3_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_contents', function (Blueprint $table) {
            $table->dropColumn([
                'brand_logo1_image', 'brand_logo1_name',
                'brand_logo2_image', 'brand_logo2_name',
                'brand_logo3_image', 'brand_logo3_name',
            ]);
        });
    }
};
