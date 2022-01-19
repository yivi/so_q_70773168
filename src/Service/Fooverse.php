<?php declare(strict_types=1);


namespace App\Service;


class Fooverse
{

    public const PROD = 'abcdefghi';

    public const DEV  = 'xyz';

    public function __construct(private string $importantDependency)
    {
    }

    public function rev(bool $rev): string
    {
        return $rev ? strrev($this->importantDependency) : $this->importantDependency;
    }
}
