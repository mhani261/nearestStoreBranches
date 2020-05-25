<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'store_name' => $this->store_name,
            'category_name' => $this->category_name,
            'logo' => $this->logo,
            'branch_name' => $this->branch_name
        ];
    }
}
