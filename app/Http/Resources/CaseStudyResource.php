<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaseStudyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'slug'       => $this->slug,
            'summary'    => $this->summary,
            'content'    => $this->content,
            'category'   => $this->category,
            'published'  => (bool) $this->published,
            'author_name'     => $this->author_name ?? 'Admin',
            'image'      => $this->image,
            'image_url'  => $this->image ? asset($this->image) : null,
            'created_at' => optional($this->created_at)->toIso8601String(),
        ];
    }
}
