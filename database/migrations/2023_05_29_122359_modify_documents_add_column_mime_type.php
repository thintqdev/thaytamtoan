<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->boolean('status')->default(1);
            $table->string('mime_type', 30)->after('name')->nullable();
            $table->longText('description')->after('name')->nullable();
            $table->unsignedInteger('category_id')->after('name')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->renameColumn('slug', 'google_drive_url');
            $table->dropColumn('file_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign('documents_category_id_foreign');
            $table->dropColumn(['mime_type', 'description', 'category_id', 'status']);
            $table->renameColumn('google_drive_url', 'slug');
            $table->string('file_path');
        });
    }
};
