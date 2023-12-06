<?php

namespace App\Http\Controllers\API;

use App\Http\Contorller\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class ProdiController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis=Prodi::all();
        $this->sendResponse($prodis,"Data Prodi");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
