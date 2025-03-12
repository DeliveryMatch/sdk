<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

abstract class Action
{
    public const SELECT = "select";
    public const SHOW = "show";
    public const SAVE = "save";
    public const RETURN_MAIL = "returnmail";
    public const ONLY_SHOW_CHEAPEST = "onlyshowcheapest";
    public const BOOK = "book";
    public const PRINT = "print";
}
