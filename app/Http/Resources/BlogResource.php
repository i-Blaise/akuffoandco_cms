<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'slug'       => $this->slug,
            'summary'    => $this->summary,
            'content'    => $this->content,
            'category'   => $this->category,
            'published'  => (bool) $this->published,
            'author'     => $this->author,
            'image'      => $this->main_image,
            'image_url'  => $this->main_image ? asset($this->main_image) : null,
            'created_at' => optional($this->created_at)->toIso8601String(),
        ];
    }
}
