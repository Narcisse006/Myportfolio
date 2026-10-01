<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public const STATUSES = [
        'online' => 'En ligne',
        'in_progress' => 'En cours',
        'testing' => 'En test',
        'archived' => 'Archivé',
    ];

    protected $fillable = [
        'title',
        'description',
        'tech_stack',
        'image',
        'gallery',
        'url',
        'github_url',
        'order',
        'is_published',
        'status',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'gallery' => 'array',
        'is_published' => 'boolean',
        'order' => 'integer',
    ];

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn (): ?string => $this->resolveMediaUrl($this->image));
    }

    /**
     * URLs publiques des captures (couverture incluse en premier si absente de la galerie).
     *
     * @return Attribute<list<string>, never>
     */
    protected function galleryUrls(): Attribute
    {
        return Attribute::get(function (): array {
            $paths = collect(is_array($this->gallery) ? $this->gallery : [])
                ->filter(fn ($path) => filled($path))
                ->values();

            if ($paths->isEmpty() && filled($this->image)) {
                $paths = collect([$this->image]);
            } elseif (filled($this->image) && ! $paths->contains($this->image)) {
                $paths = $paths->prepend($this->image);
            }

            return $paths
                ->map(fn ($path) => $this->resolveMediaUrl((string) $path))
                ->filter()
                ->values()
                ->all();
        });
    }

    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? self::STATUSES['in_progress'];
    }

    public function statusBadgeModifier(): string
    {
        return match ($this->status) {
            'online' => 'online',
            'testing' => 'testing',
            'archived' => 'archived',
            default => 'progress',
        };
    }

    private function resolveMediaUrl(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'images/')) {
            return asset($path);
        }

        return asset('storage/'.ltrim($path, '/'));
    }
}
