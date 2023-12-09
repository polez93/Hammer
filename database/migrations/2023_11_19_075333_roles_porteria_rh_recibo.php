<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role1 = Role::create(['name'=>'portero']);
        $role2 = Role::create(['name'=>'rh']);
        $role3 = Role::create(['name'=>'recibo']);
        $user1 = User::find(5);
        $user2 = User::find(6);
        $user3 = User::find(7);
        $user4 = User::find(8);
        $user1->assignRole($role1);
        $user2->assignRole($role1);
        $user3->assignRole($role2);
        $user4->assignRole($role3);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
