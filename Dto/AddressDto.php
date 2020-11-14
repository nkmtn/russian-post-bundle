<?php

declare(strict_types=1);

namespace nkmtn\RussianPostBundle\Dto;

final class AddressDto
{
    private string $country;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return AddressDto
     */
    public function setId(string $country): AddressDto
    {
        $this->country = $country;
        return $this;
    }

}