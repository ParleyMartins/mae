<?php

namespace App\Observers;

use App\Massage;
use App\Services\ModifyPackage;
use App\Package;

class MassageObserver
{
    public function created(Massage $massage)
    {
        $this->modifyPackage($massage);
    }

    public function updated(Massage $massage)
    {
        $this->modifyPackage($massage);
    }

    public function deleted(Massage $massage)
    {
        Package::where(['name' => $massage->name])->delete();
    }

    public function modifyPackage($massage)
    {
        $massage = $massage->fresh();
        ModifyPackage::updateOrCreate([
            'name' => $massage->name,
            'items' => [
                $massage->id => [
                    'price' => $massage->price,
                    'amount' => 1,
                    'duration' => $massage->duration,
                ],
            ],
        ]);
    }
}
