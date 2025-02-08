<?php

namespace App\DTOs;

use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class DateOfBirthDTO
{
    public int $day;
    public int $month;
    public int $year;

    public function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;

        $this->validate();
    }

    /**
     * Validate date of birth.
     */
    private function validate(): void
    {
        if (!checkdate($this->month, $this->day, $this->year)) {
            throw ValidationException::withMessages(['date_of_birth' => 'Invalid date of birth.']);
        }

        $dob = Carbon::create($this->year, $this->month, $this->day);
        $age = $dob->age;

        if ($age < 16) {
            throw ValidationException::withMessages(['date_of_birth' => 'User must be at least 18 years old.']);
        }
    }

    /**
     * Convert to Carbon date object.
     */
    public function toCarbon(): Carbon
    {
        return Carbon::create($this->year, $this->month, $this->day);
    }

    /**
     * Convert to string format (YYYY-MM-DD).
     */
    public function toString(): string
    {
        return $this->toCarbon()->format('Y-m-d');
    }
}
