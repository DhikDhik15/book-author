<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssociationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $books=[];
        foreach($this as $key => $values) {
            foreach($values as $book) {
                $books[] = [
                    'id' => $book->id,
                    'title' => $book->title,
                    'description' => $book->description,
                    'publish_date' => $book-> publish_date,
                    'author' => $book->author->name
                ];
            }
        }

        return $books;
    }
}
