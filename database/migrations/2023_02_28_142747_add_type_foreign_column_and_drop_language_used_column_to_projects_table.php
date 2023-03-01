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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('language_used');
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('language_used', 100)->after('github_url');
            $table->dropForeign('projects_type_id_foreign');
            $table->dropColumn('type_id');
        });
    }
};