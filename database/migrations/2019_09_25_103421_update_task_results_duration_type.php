<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Studio\Totem\Database\TotemMigration;

class UpdateTaskResultsDurationType extends TotemMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::connection(TOTEM_DATABASE_CONNECTION)
            ->table(TOTEM_TABLE_PREFIX.'task_results', function (Blueprint $table) {
                $table->decimal('duration', 24, 14)->charset('')->collation('')->change();
            });*/
        \DB::connection(TOTEM_DATABASE_CONNECTION)->statement(" ALTER TABLE ". TOTEM_TABLE_PREFIX . "task_results ALTER duration TYPE NUMERIC(24, 14) USING duration::numeric(24,14) ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(TOTEM_DATABASE_CONNECTION)
            ->table(TOTEM_TABLE_PREFIX.'task_results', function (Blueprint $table) {
                $table->string('duration', 255)->change();
            });
    }
}
