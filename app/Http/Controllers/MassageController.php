<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Massage;
use Illuminate\Http\Response;

class MassageController extends Controller
{
    public function index()
    {
        $massages = Massage::all();
        return view('massages', ['massages' => json_encode($massages)]);
    }

    public function store(Request $request)
    {
        return Massage::create($request->all());
    }

    public function update(Request $request, Massage $massage)
    {
        $massage->fill($request->all());
        $massage->save();

        return $massage->fresh();
    }

    public function destroy(Request $request, Massage $massage)
    {
        $massage->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
