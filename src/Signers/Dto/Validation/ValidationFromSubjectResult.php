<?php

namespace Sportic\Waiver\Signers\Dto\Validation;

class ValidationFromSubjectResult
{

    protected array $errors = [];

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return count($this->errors) === 0;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function addError(string $field): void
    {
        $this->errors[$field] = $field;
    }

    public function hasError(string $field): bool
    {
        return isset($this->errors[$field]);
    }
}
