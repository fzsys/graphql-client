<?php

namespace Softonic\GraphQL;

class Response {

  /**
   * @var array
   */
  private $data;

  /**
   * @var array
   */
  private $headers;

  /**
   * @var array
   */
  private $errors;

  /**
   * @var array
   */
  private $dataObject;

  public function __construct(
    array $data,
    array $errors = [],
    array $dataObject = [],
    array $headers = []
  ) {
    $this->data = $data;
    $this->errors = $errors;
    $this->dataObject = $dataObject;
    $this->headers = $headers;
  }

  public function getData(): array {
    return $this->data;
  }

  public function getHeaders(): array {
    return $this->headers;
  }

  public function getErrors(): array {
    return $this->errors;
  }

  public function hasErrors(): bool {
    return !empty($this->errors);
  }

  public function getDataObject(): array {
    return $this->dataObject;
  }

}
