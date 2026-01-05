<?php

namespace App\Models\Utilities;

use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia
{
    //
    use UuidGenerator;
    use GetModelByKeyName;
    use InteractsWithMedia;


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_valid' => 'boolean',
        ];
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
    }
}
