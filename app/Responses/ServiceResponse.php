<?php

namespace App\Responses;

class ServiceResponse
{
    protected bool $status;
    protected string $message;
    protected int $statusCode;
    protected $data;
    protected ?string $customCode;

    /**
     * Constructor
     *
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @param string|null $customCode
     */
    public function __construct($data = null, string $message = "success", int $statusCode = 200, ?string $customCode = null)
    {
        $this->data = $data;
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->customCode = $customCode;

        // auto set true if 2xx, false otherwise
        $this->status = $statusCode >= 200 && $statusCode < 400;
    }

    /**
     * Convert to array (for JSON response)
     */
    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
            'code' => $this->customCode,
        ];
    }

    /**
     * Get HTTP status code
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Get custom code
     */
    public function getCustomCode(): ?string
    {
        return $this->customCode;
    }

    /**
     * Is successful
     */
    public function isSuccess(): bool
    {
        return $this->status;
    }

    /**
     * Get raw data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get message
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
