<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    public function run()
    {
        
        $root = Role::create(['name'=>'Root']);
        $admin = Role::create(['name'=>'Admin']);
        $usuario = Role::create(['name'=>'Usuario']);
   
        Permission::create(['name'=>'crear_correspondencia_recibida'])->syncRoles([$root , $admin , $usuario ]);
        Permission::create(['name'=>'editar_correspondencia_recibida'])->syncRole($root, $admin , $usuario );
        Permission::create(['name'=>'ver_correspondencia_recibida'])->syncRoles([$root , $admin, $usuario ]);
        Permission::create(['name'=>'eliminar_correspondencia_recibida'])->syncRoles([$root , $admin , $usuario ]);

        Permission::create(['name'=>'crear_correspondencia_cerrada'])->syncRoles([$root , $admin , $usuario ]);
        Permission::create(['name'=>'editar_correspondencia_cerrada'])->syncRoles([$root , $admin , $usuario]);
        Permission::create(['name'=>'ver_correspondencia_cerrada'])->syncRoles([$root , $admin, $usuario]);
        Permission::create(['name'=>'eliminar_correspondencia_cerrada'])->syncRoles([$root , $admin , $usuario ]);

        Permission::create(['name'=>'crear_correspondencia_enviada'])->syncRoles([$root , $admin , $usuario ]);
        Permission::create(['name'=>'editar_correspondencia_enviada'])->syncRole($root, $admin , $usuario );
        Permission::create(['name'=>'correspondencia_enviada'])->syncRoles([$root , $admin, $usuario ]);
        Permission::create(['name'=>'eliminar_correspondencia_enviada'])->syncRoles([$root , $admin , $usuario ]);

        Permission::create(['name'=>'crear_correspondencia_enviada_cerrada'])->syncRoles([$root , $admin , $usuario ]);
        Permission::create(['name'=>'editar_correspondencia_enviada_cerrada'])->syncRole($root, $admin , $usuario );
        Permission::create(['name'=>'ver_correspondencia_enviada_cerrada'])->syncRoles([$root , $admin, $usuario ]);
        Permission::create(['name'=>'eliminar_correspondencia_enviada_cerrada'])->syncRoles([$root , $admin , $usuario ]);

    }
};