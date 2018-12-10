<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Massage;

class MassageController extends Controller
{
    public function index()
    {
        return Massage::paginate();
    }

    public function store($request)
    {
        return Masssage::create($request->all);
    }

    public function update($request, Massage $massage)
    {
        $massage->fill($request->all());
        $massage->save();

        return $massage->fresh();
    }

    public function delete($request, Massage $massage)
    {
        $massage->delete();
    }
}
