<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Services\ModifyPackage;
use App\Http\Requests\ModifyPackageRequest;
use App\PackageItem;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index()
    {
        return Package::paginate();
    }

    public function store(ModifyPackageRequest $request)
    {
        $data = $request->validated();

        $package = \DB::transaction(function () use ($data) {
            $package =  Package::create($data);

            foreach ($data['items'] as $item) {
                $item['package_id'] = $package->id;
                PackageItem::create($item);
            }

            return $package;
        });

        return $package;
    }

    public function update(ModifyPackageRequest $request, Package $package)
    {
        $data = $request->validated();
        DB::transaction(function () use ($data, $package) {
            $package->fill($data);
            $package->save();

            foreach ($data['items'] as $item) {
                $item['package_id'] = $package->id;
                PackageItem::updateOrCreate($item);
            }
        });

        return $package->fresh();
    }

    public function delete(Request $request, Package $package)
    {
        $package->delete();
    }
}
