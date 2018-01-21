<?php

namespace App\ValueObjects;

final class Status
{
    public const STATUS_ACTIVE = 1;
    public const STATUS_DISABLED = 0;

    public const STATUSES = [
        self::STATUS_DISABLED,
        self::STATUS_ACTIVE
    ];

    public const HUMAN_STATUSES = [
        self::STATUS_DISABLED => 'Disabled',
        self::STATUS_ACTIVE => 'Active'
    ];

    /**
     * @var int
     */
    private $status;

    /**
     * Status constructor.
     * @param int $status
     */
    public function __construct(int $status)
    {
        if (! in_array($status, self::STATUSES)) {
            throw new \InvalidArgumentException(sprintf('Invalid status %s', $status));
        }

        $this->status = $status;
    }

    /**
     * @param string $humanStatus
     * @return Status
     */
    public static function createFromHumanStatus(string $humanStatus): Status
    {
        if (! isset(self::HUMAN_STATUSES[$humanStatus])) {
            throw new \InvalidArgumentException('Invalid human status %s', $humanStatus);
        }

        return new self(self::HUMAN_STATUSES[$humanStatus]);
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->status === self::STATUS_DISABLED;
    }

    /**
     * @return int
     */
    public function getStatusValue(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getHumanStatus(): string
    {
        return self::HUMAN_STATUSES[$this->status];
    }
}