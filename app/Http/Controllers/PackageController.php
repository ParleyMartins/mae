<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Services\ModifyPackage;

class PackageController extends Controller
{
    public function index()
    {
        return Package::paginate();
    }

    public function store($request)
    {
        $package = ModifyPackage::updateOrCreate($request->all());
        return $package;
    }

    public function update($request, Package $package)
    {
        $package = ModifyPackage::updateOrCreate($request->all());
        return $package;
    }

    public function delete($request, Package $package)
    {
        $package->delete();
    }
}
