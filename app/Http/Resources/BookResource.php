<?php

namespace App\Http\Resources;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            // @TODO implement
            'id'=>$this->id,
            'isbn'=>$this->isbn,
            'title'=>$this->title,
            'description'=>$this->description,
            'published_year'=>$this->published_year,
            'authors'=>[
                'id'=>$this->authors->first()->id,
                'name'=>$this->authors->first()->name,
                'surname'=>$this->authors->first()->surname
            ],
            'review'=>[
                'avg'=>(float)$this->reviews->avg('review'),
                'count'=>$this->reviews->count('review')
            ]
        ];
    }
}
