<?php

namespace App\Services;

use App\Models\SiteSetting;
use App\Models\Profile;

class SiteSettingsService
{
    public function getSettings(): SiteSetting
    {
        return SiteSetting::first() ?? new SiteSetting();
    }

    public function getProfile(): ?Profile
    {
        return Profile::first();
    }

    public static function clearCache(): void
    {
        // Sementara dikosongkan, cache akan ditambahkan lagi nanti
    }
}