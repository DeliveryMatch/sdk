<?php

declare(strict_types=1);

namespace DeliveryMatch\Api\Dto\Request;

abstract class Method
{
    public const CHEAPEST = "lowprice";
    public const FASTEST = "first";
    public const GREENEST = "green";
}
