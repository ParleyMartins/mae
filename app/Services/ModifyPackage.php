<?php

namespace App\Services;

use App\Package;
use App\Massage;

class ModifyPackage
{
    public static function updateOrCreate($data)
    {
        $package = \DB::transaction(function () use ($data) {
            $package = Package::updateOrCreate(['name' => $data['name']]);
            $package->items()->sync($data['items']);
            return $package;
        });

        return $package;
    }
}
