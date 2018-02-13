<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPropertyOnDeleteCascadeToForeignKeyNotebookIdOnNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign("notes_notebook_id_foreign");
            $table->foreign('notebook_id')->references('id')->on('notebooks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign("notes_notebook_id_foreign");
            $table->foreign('notebook_id')->references('id')->on('notebooks');
        });
    }
}
