<?php

declare(strict_types=1);

/*
 * Copyright 2016 Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace JMS\Serializer;

use JMS\Serializer\Exception\LogicException;

class DeserializationContext extends Context
{
    private $depth = 0;

    public static function create(): self
    {
        return new self();
    }

    public function getDirection(): int
    {
        return GraphNavigatorInterface::DIRECTION_DESERIALIZATION;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function increaseDepth(): void
    {
        $this->depth += 1;
    }

    public function decreaseDepth(): void
    {
        if ($this->depth <= 0) {
            throw new LogicException('Depth cannot be smaller than zero.');
        }

        $this->depth -= 1;
    }
}
