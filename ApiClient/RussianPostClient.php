<?php

declare(strict_types=1);

namespace nkmtn\RussianPostBundle\ApiClient;

use DateTime;
use Exception;
use Illuminate\Support\Arr;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use nkmtn\RussianPostBundle\Dto\AddressDto;


class RussianPostClient
{
    protected HttpClientInterface $client;
    protected string $accessToken;

    /**
     * RussianPostClient constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->client = HttpClient::create([
            'base_uri' => 'https://address.pochta.ru/validate/api/v7_1'
        ]);

        $this->accessToken = $token;
    }

    public function validate(string $address)
    {

        $response = $this->client->request('POST', '/', [
            'headers' => [
                'Content-Type' => 'application/json',
                'AuthCode' => $this->accessToken,
            ],
        ]);

//        if ($response->getStatusCode() !== Response::HTTP_OK) {
//            $this->logger->critical('Cannot fetch accounts', [
//                'statusCode' => $response->getStatusCode(),
//                'response' => $response->getContent()
//            ]);
//
//            return [];
//        }

        $content = $response->toArray();

        $result = new AddressDto();
        $result->setName($content['element'][0]['val']);

        return $result;
    }
}
