<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioSetting extends Model
{
    protected $fillable = [
        'phone_bj',
        'phone_bf',
        'address',
        'whatsapp',
    ];

    public static function current(): self
    {
        return static::query()->first() ?? new static;
    }

    public function phoneBjDisplay(): string
    {
        return $this->filledOrConfig($this->phone_bj, 'portfolio.phone_bj.display');
    }

    public function phoneBjTel(): string
    {
        return $this->telHref($this->phoneBjDisplay());
    }

    public function phoneBfDisplay(): string
    {
        return $this->filledOrConfig($this->phone_bf, 'portfolio.phone_bf.display');
    }

    public function phoneBfTel(): string
    {
        return $this->telHref($this->phoneBfDisplay());
    }

    public function addressDisplay(): string
    {
        return $this->filledOrConfig($this->address, 'portfolio.address');
    }

    public function whatsappDisplay(): string
    {
        return $this->filledOrConfig($this->whatsapp, 'portfolio.whatsapp.display');
    }

    public function whatsappUrl(): string
    {
        $digits = preg_replace('/\D+/', '', $this->whatsappDisplay()) ?? '';

        return 'https://wa.me/'.$digits.'?text='.rawurlencode(
            'Bonjour Narcisse, je souhaite vous contacter concernant '
        );
    }

    private function filledOrConfig(?string $value, string $configKey): string
    {
        if (filled($value)) {
            return (string) $value;
        }

        return (string) config($configKey, '');
    }

    private function telHref(string $display): string
    {
        $digits = preg_replace('/\D+/', '', $display) ?? '';

        return '+'.$digits;
    }
}
