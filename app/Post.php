<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body) {
        $this->comments()->create([
            'body' => $body,
            'user_id' => auth()->id()
        ]);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters) {
        if ( isset($filters['year']) ) {
            $query->whereYear('created_at', request('year'));
        }

        if ( isset($filters['month']) ) {
            $query->whereMonth('created_at', Carbon::parse(request('month'))->month);
        }
    }

    public static function archives() {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'asc')
            ->get();
    }
}
