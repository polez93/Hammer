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
        $porteria = Permission::create(['name' => 'porteria']);
        $gestionPersonal = Permission::create(['name' => 'gestionPersonal']);
        $recibo = Permission::create(['name' => 'recibo']);
        $roleportero = Role::find(4);
        $rolerh = Role::find(5);
        $rolerecibo = Role::find(6);

        $roleportero->givePermissionTo($porteria);
        $rolerh->givePermissionTo($gestionPersonal);
        $rolerecibo->givePermissionTo($recibo);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
