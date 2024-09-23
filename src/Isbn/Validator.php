<?php

declare(strict_types=1);

namespace App\Isbn;

use Symfony\Component\Validator\Constraints\Isbn;
use Symfony\Component\Validator\Constraints\IsbnValidator;

class Validator extends IsbnValidator
{
    public function isValid(string $isbn): bool
    {
        $canonical = str_replace('-', '', $isbn);

        // First, try ISBN-10
        $code = $this->validateIsbn10($canonical);

        // The ISBN can only be an ISBN-13 if the value was too long for ISBN-10
        if (Isbn::TOO_LONG_ERROR === $code) {
            // Try ISBN-13 now
            $code = $this->validateIsbn13($canonical);

            // If too short, this means we have 11 or 12 digits
            if (Isbn::TOO_SHORT_ERROR === $code) {
                return false;
            }
        }

        return true === $code;
    }
}