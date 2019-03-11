<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Productresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'attachments' => $this->attachments,
            'category' => empty($this->category) ? 'No category' : $this->category->name
        ];
    }
}
