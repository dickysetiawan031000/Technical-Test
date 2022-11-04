<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
        //     'user_id' => $this->user_id,
        //     'comment' => $this->comment,
        //     'news_id' => $this->news_id,
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
