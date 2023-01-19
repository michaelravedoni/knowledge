<?php

namespace App\Traits;

use App\Services\OgImageGenerator;

trait HasOgImage
{
    public function getOgImage(?string $description, $subject = 'Knowledge'): string
    {
        return OgImageGenerator::make($this->title ?? $this->name ?? $this->getTable())
                               ->withSubject($subject)
                               ->withDescription($description)
                               ->withPolygonDecoration()
                               ->withFilename("{$this->slug}-{$this->id}.jpg")
                               ->generate()
                               ->getPublicUrl();
    }
}
