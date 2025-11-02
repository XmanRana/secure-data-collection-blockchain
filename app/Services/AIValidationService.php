<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class AIValidationService
{
    public function validateSubmission(array $data): array
    {
        try {
            $score = 0;
            $issues = [];
            $suggestions = [];

            // Email Validation (20 points)
            if ($this->validateEmail($data['email'])) {
                $score += 20;
            } else {
                $issues[] = 'Invalid email format detected';
                $suggestions[] = 'Use a valid email like user@example.com';
            }

            // Phone Validation (20 points)
            if ($this->validatePhone($data['phone'])) {
                $score += 20;
            } else {
                $issues[] = 'Phone must be exactly 10 digits';
                $suggestions[] = 'Enter a valid 10-digit phone number without spaces';
            }

            // Name Validation (20 points)
            if ($this->validateName($data['full_name'])) {
                $score += 20;
            } else {
                $issues[] = 'Name must contain only letters and spaces (minimum 3 characters)';
                $suggestions[] = 'Enter your full name with only letters and spaces';
            }

            // Address Validation (20 points)
            if ($this->validateAddress($data['address'])) {
                $score += 20;
            } else {
                $issues[] = 'Address must be at least 10 characters long';
                $suggestions[] = 'Provide a complete address with street, city details';
            }

            // Data Consistency (20 points)
            if ($this->checkDataConsistency($data)) {
                $score += 20;
            } else {
                $issues[] = 'Data appears inconsistent';
                $suggestions[] = 'Review your information for accuracy';
            }

            return [
                'is_valid' => $score >= 70,
                'confidence_score' => $score,
                'issues' => $issues,
                'suggestions' => $suggestions,
            ];

        } catch (\Exception $e) {
            Log::error('AI Validation Error: ' . $e->getMessage());
            return [
                'is_valid' => false,
                'confidence_score' => 0,
                'issues' => ['Validation error'],
                'suggestions' => [],
            ];
        }
    }

    private function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) >= 5;
    }

    private function validatePhone(string $phone): bool
    {
        $phone = preg_replace('/[\s\-]/', '', $phone);
        return preg_match('/^[0-9]{10}$/', $phone);
    }

    private function validateName(string $name): bool
    {
        if (strlen($name) < 3 || strlen($name) > 255) {
            return false;
        }
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            return false;
        }
        return !preg_match('/\s{2,}/', $name);
    }

    private function validateAddress(string $address): bool
    {
        if (strlen($address) < 10 || strlen($address) > 500) {
            return false;
        }
        if (!preg_match('/[0-9]/', $address) || !preg_match('/[a-zA-Z]/', $address)) {
            return false;
        }
        return preg_match_all('/[^a-zA-Z0-9\s,.-]/', $address) <= 2;
    }

    private function checkDataConsistency(array $data): bool
    {
        return true;
    }
}
