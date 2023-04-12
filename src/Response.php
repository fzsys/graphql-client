<?php

namespace Softonic\GraphQL;

class Response
{
    private $data;

    private $headers;

    private $errors;

    public function __construct(array $data, array $headers = [], array $errors = [])
    {
        $this->data = $data;
        $this->headers = $headers;
        $this->errors = $errors;
    }

    public function getData(): array
    {
        return $this->data;
    }

  public function getHeaders(): array
  {
    return $this->headers;
  }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}
