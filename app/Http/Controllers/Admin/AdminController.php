<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userController()
    {
        $title = 'Listado de Usuario';
        return view('admin.user.index', [
            'title' => $title,
        ]);
    }
    public function permissionsController()
    {
        $title = 'Listado de Permisos';
        return view('admin.permission.index', [
            'title' => $title,
        ]);
    }
    public function roleController()
    {
        $title = 'Listado de Roles';
        return view('admin.role.index', [
            'title' => $title,
        ]);
    }

    public function countryController()
    {
        $title = 'Listado de Paises';
        return view('admin.config.country.index', [
            'title' => $title,
        ]);
    }
    public function provinceController()
    {
        $title = 'Listado de Paises';
        return view('admin.config.province.index', [
            'title' => $title,
        ]);
    }
}
