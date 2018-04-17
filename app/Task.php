<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function scopeCompleted($query) {
        return $query->where('completed', true);
    }

    public function scopeIncomplete($query) {
        return $query->where('completed', false);
    }
}
