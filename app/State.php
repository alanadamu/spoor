<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

use App\LocalGovernment;
use App\Incident;

class State extends Model {
    
    use Searchable;

    /**
     * Eloquent Relationships
     */
    public function localGovernments() {
        return $this->hasMany(LocalGovernment::class);
    }

    public function incidents() {
        return $this->morphMany(Incident::class, 'location');
    }
}