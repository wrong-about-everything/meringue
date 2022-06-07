<?php

declare(strict_types=1);

namespace Meringue\Schedule\Type;

abstract class Type
{
    abstract public function value(): int;

    abstract protected function comparableWith(): array;

    final public function isComparableWith(Type $type): bool
    {
        return
            in_array(
                $type->value(),
                array_merge(
                    [$type->value()],
                    array_map(
                        function (Type $type) {
                            return $type->value();
                        },
                        $this->comparableWith()
                    )
                )
            );
    }
}