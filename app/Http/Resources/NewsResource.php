<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


    public function toArray($request)
    {
        // return parent::toArray($request);

        // return [
        //     'id' => $this->id,
        //     'image' => $this->image,
        //     'title' => $this->title,
        //     'content' => $this->content,
        //     // 'deleted_at' => $this->deleted_at->format('d/m/y'),
        //     'created_at' => $this->created_at->format('d/m/y'),
        //     'updated_at' => $this->updated_at->format('d/m/y'),
        // ];

        return [
            // 'success'   => $this->status,
            // 'message'   => $this->message,
            'data'      => $this->resource
        ];
    }
}
