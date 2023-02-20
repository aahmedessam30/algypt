<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\V1\Api\Client\{StoreClientRequest, UpdateClientRequest};
use App\Http\Resources\V1\{ClientResource, SuccessResource, ErrorResource};
use Illuminate\Support\Facades\Log;
use App\Models\V1\Client;

class ClientController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection|ErrorResource
    {
        $clients = Client::paginate(config('app.pagination'));
        return count($clients) > 0
            ? ClientResource::collection($clients)
            : ErrorResource::make(__('messages.no_data_found'));
    }

    public function store(StoreClientRequest $request): SuccessResource|ErrorResource
    {
        try {
            return Client::create($request->safe()->merge(['password' => Hash::make($request->password)])->all())
                ? SuccessResource::make(__('messages.success.create', ['attribute' => __('attributes.client')]))
                : ErrorResource::make(__('messages.failed.create', ['attribute' => __('attributes.client')]));
        } catch (\Exception $e) {
            Log::channel('api')->error("Error in ClientController@store: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
            return ErrorResource::make(__('messages.error_occurred'));
        }
    }

    public function show($id): ClientResource|ErrorResource
    {
        return Client::find($id)
            ? ClientResource::make(Client::find($id))
            : ErrorResource::make(__('messages.no_data_found', ['attribute' => __('attributes.client')]));
    }

    public function update(UpdateClientRequest $request, $id): SuccessResource|ErrorResource
    {
        try {
            return ($client = Client::find($id))
                ? $client->update($request->safe()->all())
                    ? SuccessResource::make(__('messages.success.update', ['attribute' => __('attributes.client')]))
                    : ErrorResource::make(__('messages.failed.update', ['attribute' => __('attributes.client')]))
                : ErrorResource::make(__('messages.no_data_found', ['attribute' => __('attributes.client')]));
        } catch (\Exception $e) {
            Log::channel('api')->error("Error in ClientController@update: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
            return ErrorResource::make(__('messages.error_occurred'));
        }
    }

    public function destroy($id): SuccessResource|ErrorResource
    {
        try {
            return ($client = Client::find($id))
                ? $client->delete()
                    ? SuccessResource::make(__('messages.success.delete', ['attribute' => __('attributes.client')]))
                    : ErrorResource::make(__('messages.failed.delete', ['attribute' => __('attributes.client')]))
                : ErrorResource::make(__('messages.no_data_found', ['attribute' => __('attributes.client')]));
        } catch (\Exception $e) {
            Log::channel('api')->error("Error in ClientController@destroy: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
            return ErrorResource::make(__('messages.error_occurred'));
        }
    }
}
