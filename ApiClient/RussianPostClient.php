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
//            'base_uri' => 'https://address.pochta.ru/validate/api/v7_1'
        ]);

        $this->accessToken = $token;
    }

    public function validate(string $address)
    {

        $response = $this->client->request('POST', 'https://address.pochta.ru/validate/api/v7_1/', [
            'headers' => [
                'Content-Type' => 'application/json',
                'AuthCode' => $this->accessToken,
            ],
            'json' => [
                "addr" => [ ["val" => "респ. Северная Осетия - Алания, г. Владикавказ,   ул. Штыба, д. 2"] ],
                "version" => "v7_2",
                "reqId" => "12204cb4-37fb-4059-91e6-c6e17e946d7f"
            ]
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

//    private ?string $country;
//    private ?string $districtType;  // край/респ/обл
//    private ?string $districtName;  //Красноярский/Карелия/Ленинградская
//    private ?string $localityType;  // г
//    private ?string $localityName;  // Петрозаводск
//    private ?string $streetType;    // ул/пр
//    private ?string $streetName;    // Лисициной

        $result = new AddressDto();
        foreach($content['addr']['element'] as $piece){

            if(strcasecmp($piece['content'], 'C')){
                $result->setCountry($content['addr']['element'][0]['val']);
            }

            if(strcasecmp($piece['content'], 'R')){
                $result->setDistrictType($content['addr']['element'][0]['stname']);
                $result->setDistrictName($content['addr']['element'][0]['val']);
            }

            if(strcasecmp($piece['content'], 'P')) {
                $result->setStreetType($content['addr']['element'][0]['stname']);
                $result->setStreetName($content['addr']['element'][0]['val']);
            }
        }
        return $result;
    }
}

