<?php
spl_autoload_register(function ($class) {
    include "../models/" . $class . ".php";
});

class RoleController
{
    // public function loadRoles()
    // {
    //     $r = new Role();
    //     $res = $r->loadRoles();
    //     return $res;
    // }
}
