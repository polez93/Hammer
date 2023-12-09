<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $gestionAdmin = Permission::create(['name' => 'gestion']);
        $operacion = Permission::create(['name' => 'operacion']);
        $roleAdmin = Role::find(1);
        $roleOperador = Role::find(2);

        $roleAdmin->givePermissionTo($gestionAdmin);
        $roleOperador->givePermissionTo($operacion);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
