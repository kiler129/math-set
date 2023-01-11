<?php
declare(strict_types=1);

namespace NoFlash\MathSet\DTO;

/**
 * Represents a set in mathematical sense
 */
class IntegerSet
{
    private bool $leftClosed;
    private bool $rightClosed;

    public function __construct(
        private ?int $left,
        private ?int $right,
        bool $leftClosed = true,
        bool $rightClosed = true
    ) {
        if (!($left === null || $right === null) && $left > $right) {
            throw new \InvalidArgumentException('Left cannot be larger than right!');
        }


        $this->leftClosed = $left !== null && $leftClosed;
        $this->rightClosed = $right !== null && $rightClosed;
    }

    public function getLeft(): ?int
    {
        return $this->left;
    }

    public function getRight(): ?int
    {
        return $this->right;
    }

    public function isLeftClosed(): bool
    {
        return $this->leftClosed;
    }

    public function isRightClosed(): bool
    {
        return $this->rightClosed;
    }

    public function isFinite(): bool
    {
        return $this->left !== null && $this->right !== null;
    }

    public function asString(): string
    {
        return ($this->leftClosed ? '[' : '(') .
               ($this->left ?? '-∞') . ',' .
               ($this->right ?? '∞') .
               ($this->rightClosed ? ']' : ')')
            ;
    }

    public function __toString(): string
    {
        return $this->asString();
    }
}
