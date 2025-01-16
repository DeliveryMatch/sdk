<?php

declare(strict_types=1);

namespace DeliveryMatch\HttpClient\Plugin;

use DeliveryMatch\Exception\DeliveryMatchApiException;
use DeliveryMatch\HttpClient\Message\ResponseMediator;
use Http\Client\Common\Plugin;
use Psr\Http\Message\RequestInterface;
use Http\Promise\Promise;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

final class DeliveryMatchExceptionThrower implements Plugin
{
    private const SUCCESS_CODES = [7, 30, 37, 38, 137, 150, 690, 790];

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request)->then(onFulfilled: function (ResponseInterface $response) {
            $statusCode = $response->getStatusCode();

            if (!str_starts_with((string) $statusCode, "2")) {
                throw new RuntimeException("Unexpected status code: $statusCode. Expected a 2xx success status code.");
            }

            $responseData = ResponseMediator::getContent($response);

            $code = $responseData['code'] ?? null;
            if (!empty($code) && is_int($code) && !in_array((int) $code, self::SUCCESS_CODES)) {
                $message = $responseData['message'] ?? "Request returned an unsuccessful result";
                throw new DeliveryMatchApiException(message: $message, code: (int) $code);
            }
        });
    }
}
