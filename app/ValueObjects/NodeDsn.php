<?php

namespace App\ValueObjects;

final class NodeDsn
{
    /**
     * @var
     */
    private $dsn;

    /**
     * NodeDsn constructor.
     * @param string $dsn
     */
    public function __construct(string $dsn)
    {
        $this->dsn = $dsn;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        parse_str($this->dsn, $values);

        return $values[$key] ?? $default;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->dsn;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}