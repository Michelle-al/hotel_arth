<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class HeroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'media_url' => $this->media_url,
            'title' => $this->getTranslation('title', App::getLocale()),
            'subtitle' => $this->getTranslation('subtitle', App::getLocale())
        ];
    }


}
