<?php

//use App\Models\Permission;
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                "name" => "role_read",
                "display_name" => "Display Role Listing",
                "description" => "See only Listing Of Role"
            ],
            [
                "name" => "role_create",
                "display_name" => "Create Role",
                "description" => "Create New Role"
            ],
            [
                "name" => "role_edit",
                "display_name" => "Edit Role",
                "description" => "Edit Role"
            ],
            [
                "name" => "role_delete",
                "display_name" => "Delete Role",
                "description" => "Delete Role"
            ],
            [
                "name" => "item_list",
                "display_name" => "Display Item Listing",
                "description" => "See only Listing Of Item"
            ],
            [
                "name" => "item_create",
                "display_name" => "Create Item",
                "description" => "Create New Item"
            ],
            [
                "name" => "item_edit",
                "display_name" => "Edit Item",
                "description" => "Edit Item"
            ],
            [
                "name" => "item_delete",
                "display_name" => "Delete Item",
                "description" => "Delete Item"
            ],
        ];

        foreach ($permissions as $key=>$value){
            Permission::create($value);
        }
    }
}
