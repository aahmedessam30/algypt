<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Client\{StoreClientRequest, UpdateClientRequest};

class ClientController extends Controller
{
    public function index()
    {
        dd('index');
    }

    public function store(StoreClientRequest $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(UpdateClientRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
