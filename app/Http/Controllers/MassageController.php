<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Massage;
use Illuminate\Http\Response;

class MassageController extends Controller
{
    public function index()
    {
        return Massage::paginate();
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
