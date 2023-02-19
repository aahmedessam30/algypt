<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResource extends JsonResource
{
    public int $statusCode;
    public static $wrap = null;

    public function __construct($resource, $statusCode = 200)
    {
        parent::__construct($resource);
        $this->statusCode = $statusCode;
    }

    public function toArray(Request $request): array
    {
        return is_array($this->resource) ? $this->resource : ['message' => $this->resource];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode($this->statusCode);
    }

    public function withWrappData()
    {
        self::$wrap = 'data';
        return $this;
    }
}
