<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public const CATEGORIES = [
        'Kesehatan Mental',
        'Pendidikan & Anak',
        'Karir & Organisasi',
        'Uji Kompetensi',
    ];

    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'cover_image',
        'author_name',
        'reading_time',
        'is_published',
        'published_at',
        'views_count',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
            'reading_time' => 'integer',
            'views_count'  => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('loaction_public_home');
        });

        static::deleted(function () {
            Cache::forget('loaction_public_home');
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        if (blank($search)) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
                ->orWhere('excerpt', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%");
        });
    }

    public function scopeCategory(Builder $query, ?string $category): Builder
    {
        if (blank($category) || $category === 'Semua') {
            return $query;
        }

        return $query->where('category', $category);
    }

    public function getCoverImageUrlAttribute(): string
    {
        if (!empty($this->cover_image)) {
            if (Str::startsWith($this->cover_image, ['http://', 'https://'])) {
                return $this->cover_image;
            }

            if (file_exists(public_path('uploads/posts/' . $this->cover_image))) {
                return asset('uploads/posts/' . $this->cover_image);
            }

            if (file_exists(public_path($this->cover_image))) {
                return asset($this->cover_image);
            }
        }

        // High quality fallback imagery based on category
        return match ($this->category) {
            'Kesehatan Mental'   => 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1200&q=80',
            'Pendidikan & Anak'  => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80',
            'Karir & Organisasi' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80',
            'Uji Kompetensi'     => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80',
            default              => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=1200&q=80',
        };
    }

    public static function estimateReadingTime(?string $content): int
    {
        if (blank($content)) {
            return 1;
        }

        $wordCount = str_word_count(strip_tags($content));
        $minutes = (int) ceil($wordCount / 200);

        return max(1, $minutes);
    }
}
