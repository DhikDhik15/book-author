<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $authors=[];
        foreach($this as $key => $values) {
            foreach($values as $author) {
                $authors[] = [
                    'id' => $author->id,
                    'name' => $author->name,
                    'bio' => $author->bio,
                    'birth_date' => $author->birth_date,
                ];
            }
        }

        return $authors;
    }
}
