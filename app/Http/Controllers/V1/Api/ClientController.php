<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Client\{StoreClientRequest, UpdateClientRequest};
use App\Http\Resources\V1\{ClientResource, SuccessResource, ErrorResource};
use Illuminate\Support\Facades\{DB, Hash, Log};
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
            DB::beginTransaction();
            $client = Client::create($request->safe()->all());
            $client->media()->sync($request->media);
            DB::commit();
            return SuccessResource::make(__('messages.success.create', ['attribute' => __('attributes.client')]));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('api')->error("Error in ClientController@store: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
            return ErrorResource::make(__('messages.failed.create', ['attribute' => __('attributes.client')]));
        }
    }

    public function show($id): ClientResource|ErrorResource
    {
        return ($client = Client::find($id))
            ? ClientResource::make($client->load('media'))
            : ErrorResource::make(__('messages.no_data_found', ['attribute' => __('attributes.client')]));
    }

    public function update(UpdateClientRequest $request, $id): SuccessResource|ErrorResource
    {
        try {
            if (!empty($request->safe()->all())) {
                if ($client = Client::find($id)) {
                    DB::beginTransaction();
                    $client->update($request->safe()->all());
                    $client->media()->sync($request->media);
                    DB::commit();
                    return SuccessResource::make(__('messages.success.update', ['attribute' => __('attributes.client')]));
                }
                return ErrorResource::make(__('messages.no_data_found', ['attribute' => __('attributes.client')]));
            }
            return ErrorResource::make(__('messages.missing_data'), 422);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('api')->error("Error in ClientController@update: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
            return ErrorResource::make(__('messages.failed.update', ['attribute' => __('attributes.client')]));
        }
    }

    public function destroy($id): SuccessResource|ErrorResource
    {
        try {
            if ($client = Client::find($id)) {
                DB::beginTransaction();
                $client->delete();
                $client->media()->delete();
                DB::commit();
                return SuccessResource::make(__('messages.success.delete', ['attribute' => __('attributes.client')]));
            }
            return ErrorResource::make(__('messages.no_data_found', ['attribute' => __('attributes.client')]));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('api')->error("Error in ClientController@destroy: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
            return ErrorResource::make(__('messages.failed.delete', ['attribute' => __('attributes.client')]));
        }
    }
}
