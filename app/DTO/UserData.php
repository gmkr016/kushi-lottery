<?php

namespace App\DTO;

use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserData extends Data
{
    public function __construct(
        public string|Optional|null $id,
        public string|null|Optional $username,
        public string $email,
        public string|Optional|null $name,
        public string|Optional|null $cname,
        public string|Optional|null $pan,
        public string|Optional|null $photo,
        public string|Optional|null $contact,
        public string|Optional|null $password,
        public string|Optional|null $location,
        public string|Optional|null $created_at
    ) {
        if ($this->username == null) {
            $this->generateUsername();
        }
    }

    private function generateUsername(): void
    {
        Str::slug($this->name);
    }
}
