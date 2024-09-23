<?php

declare(strict_types=1);

namespace App\Isbn;

class Generator
{
    public function generate(): string
    {
        $prefix = (rand(0, 1) == 0) ? '978' : '979';
        $registrationGroup = str_pad((string)rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $registrant = str_pad((string)rand(0, 999), 3, '0', STR_PAD_LEFT);
        $publication = str_pad((string)rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $isbnWithoutChecksum = $prefix . $registrationGroup . $registrant . $publication;

        $checksum = 0;
        $weight = 1;

        for ($i = 0; $i < 12; $i++) {
            $digit = (int)$isbnWithoutChecksum[$i];
            $checksum += $digit * $weight;
            $weight = ($weight == 1) ? 3 : 1;
        }

        $checksumDigit = (10 - ($checksum % 10)) % 10;

        return $isbnWithoutChecksum . $checksumDigit;
    }
}