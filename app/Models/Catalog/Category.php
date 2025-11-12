<?php

namespace App\Models\Catalog;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    use UuidGenerator;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_valide' => 'boolean',
        ];
    }
}
