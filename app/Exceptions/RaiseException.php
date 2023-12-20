<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class RaiseException extends Exception
{
    protected $message;
    protected int $status;
    protected mixed $errors;

    public function __construct($message = "Exception occur", $status = 404, $errors = null)
    {
        parent::__construct('');

        parent::__construct($message);
        $this->status = $status;
        $this->errors = $errors;

    }

    public function render($request): JsonResponse
    {
        return response()->json(['message' => $this->getMessage(), 'errors' => $this->errors], $this->status);
    }
}
