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
        Schema::table('bookings', function (Blueprint $table) {
            // Check if the foreign key exists before dropping it
            if (Schema::hasColumn('bookings', 'get_in_bus_stop_id')) {
                $foreignKeys = Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys('bookings');
                foreach ($foreignKeys as $foreignKey) {
                    if ($foreignKey->getName() === 'bookings_get_in_bus_stop_id_foreign') {
                        $table->dropForeign(['get_in_bus_stop_id']);
                    }
                }
                $table->dropColumn('get_in_bus_stop_id');
            }
            if (Schema::hasColumn('bookings', 'drop_off_bus_stop_id')) {
                $foreignKeys = Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys('bookings');
                foreach ($foreignKeys as $foreignKey) {
                    if ($foreignKey->getName() === 'bookings_drop_off_bus_stop_id_foreign') {
                        $table->dropForeign(['drop_off_bus_stop_id']);
                    }
                }
                $table->dropColumn('drop_off_bus_stop_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('get_in_bus_stop_id')->nullable();
            $table->unsignedBigInteger('drop_off_bus_stop_id')->nullable();

            $table->foreign('get_in_bus_stop_id')->references('id')->on('bus_stops')->onDelete('cascade');
            $table->foreign('drop_off_bus_stop_id')->references('id')->on('bus_stops')->onDelete('cascade');
        });
    }
};