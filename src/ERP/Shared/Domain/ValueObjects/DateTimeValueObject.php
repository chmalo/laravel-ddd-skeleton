<?php

declare(strict_types=1);

namespace Medine\ERP\Shared\Domain\ValueObjects;

use Medine\ERP\Shared\Domain\Exceptions\InvalidDateException;

class DateTimeValueObject
{
    private $date;

    public function __construct(string $date = 'now')
    {
        $this->date = $this->setDate($date);
    }

    public static function createFromFormat(string $format, string $dateTime): self
    {
        $dateTimeImmutable = \DateTimeImmutable::createFromFormat($format, $dateTime);

        if (false == $dateTimeImmutable)
            throw new InvalidDateException("The given date time is invalid", 400);

        return new self(
            $dateTimeImmutable->format('Y-m-d H:s:i')
        );
    }

    private function setDate(string $date): string
    {
        $date = $date != 'now'
            ? $date
            : date('Y-m-d H:s:i');

        $explodedDate = explode('-', $date);

        if (!checkdate(
            (int)$explodedDate[1],
            (int)$explodedDate[2],
            (int)$explodedDate[0]
        ))
            throw new InvalidDateException('The given date time is invalid', 400);

        return $date;
    }

    public static function now()
    {
        $dateTimeImmutable = new \DateTimeImmutable;

        return new self(
            $dateTimeImmutable->format('Y-m-d H:s:i')
        );
    }

    public function value(): string
    {
        return $this->date;
    }

    public function equals(self $newValue): bool
    {
        return $this->date === $newValue->value();
    }

    public function format(string $format): string
    {
        $dateTimeImmutable = new \DateTimeImmutable($this->date);

        return $dateTimeImmutable->format($format);
    }
}
