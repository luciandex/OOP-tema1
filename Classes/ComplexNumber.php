<?php declare(strict_types=1);


class ComplexNumber
{

    private $real;

    private $imaginary;

    public function getComplexNo(): array
    {
        return [$this->real, $this->imaginary];
    }

    public function __construct(?int $real = null, string $imaginary = "")
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
    }

    public function __destruct()
    {
        $this->real = null;
        $this->imaginary = null;
    }

}