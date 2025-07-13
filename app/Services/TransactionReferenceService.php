<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

final class TransactionReferenceService
{
    /**
     * Generate a unique transaction reference
     *
     * @param string $prefix
     * @return string
     */
    public static function generate(string $prefix = 'TXN-'): string
    {
        do {
            // Example: TXN-20250709-8F5C7A
            $reference = $prefix . now()->format('Ymd') . '-' . Str::upper(Str::random(6));
        } while (self::referenceExists($reference));

        return $reference;
    }

    /**
     * Check if a reference already exists in the database
     *
     * @param string $reference
     * @return bool
     */
    protected static function referenceExists(string $reference): bool
    {
        return DB::table('fee_records')
            ->where('reference', $reference)
            ->exists();
    }
}
