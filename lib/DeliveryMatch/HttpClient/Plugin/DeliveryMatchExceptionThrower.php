<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\HttpClient\Plugin;

use DeliveryMatch\Sdk\Exception\DeliveryMatchApiException;
use DeliveryMatch\Sdk\Exception\RuntimeException;
use DeliveryMatch\Sdk\HttpClient\Message\ResponseMediator;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class DeliveryMatchExceptionThrower implements Plugin
{
    private const SUCCESS_CODES = [7, 30, 37, 38, 137, 150, 690, 790];

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request)->then(function (ResponseInterface $response) {
            $statusCode = $response->getStatusCode();

            if (!str_starts_with((string) $statusCode, "2")) {
                throw new RuntimeException("Unexpected status code: $statusCode. Expected a 2xx success status code.");
            }

            $responseData = ResponseMediator::getContent($response);

            $code = $responseData['code'] ?? null;
            if (!empty($code) && is_int($code) && !in_array($code, self::SUCCESS_CODES)) {
                $message = $responseData['message'] ?? "Request returned an unsuccessful result";
                throw new DeliveryMatchApiException($message, $code);
            }

            return $response;
        });
    }
}
