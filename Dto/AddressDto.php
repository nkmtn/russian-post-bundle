<?php

declare(strict_types=1);

namespace nkmtn\RussianPostBundle\Dto;

final class AddressDto
{
    private ?string $country;
    private ?string $districtType;  // край/респ/обл
    private ?string $districtName;  //Красноярский/Карелия/Ленинградская
    private ?string $ariaType;  // р-н
    private ?string $ariaName;  // Древлянка
    private ?string $localityType;  // г/с
    private ?string $localityName;  // Петрозаводск
    private ?string $streetType;    // ул/пр
    private ?string $streetName;    // Лисициной
    private ?string $houseType;   // д
    private ?string $houseType;   // Номер дома
    private ?string $letter;    // Литера
    private ?string $delimiter; //Дробь
    private ?string $external;  // Корпус

    private ?string $building;  // Строение
    private ?string $flat;  // Помещение/Квартира
    private ?string $box;   // Абонентский ущик
    private ?string $ops;   // Отделение почтовой связи
    private ?string $army;  // Войскоая часть

    /*** COUNTRY ***/

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
    public function setCountry(string $country): AddressDto
    {
        $this->country = $country;
        return $this;
    }

    /*** DISTRICT ***/

    /**
     * @return string
     */
    public function getDistrictType(): string
    {
        return $this->districtType;
    }

    /**
     * @param string $districtType
     * @return AddressDto
     */
    public function setDistrictType(string $districtType): AddressDto
    {
        $this->districtType = $districtType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDistrictName(): string
    {
        return $this->districtName;
    }

    /**
     * @param string $districtName
     * @return AddressDto
     */
    public function setDistrictName(string $districtName): AddressDto
    {
        $this->districtName = $districtName;
        return $this;
    }

    /*** LOCALITY ***/

    /**
     * @return string
     */
    public function getLocalityType(): string
    {
        return $this->localityType;
    }

    /**
     * @param string $localityType
     * @return AddressDto
     */
    public function setLocalityType(string $localityType): AddressDto
    {
        $this->localityType = $localityType;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalityName(): string
    {
        return $this->localityName;
    }

    /**
     * @param string $localityName
     * @return AddressDto
     */
    public function setLocalityName(string $localityName): AddressDto
    {
        $this->localityName = $localityName;
        return $this;
    }

    /*** STREET ***/

    /**
     * @return string
     */
    public function getStreetType(): string
    {
        return $this->streetType;
    }

    /**
     * @param string $streetType
     * @return AddressDto
     */
    public function setStreetType(string $streetType): AddressDto
    {
        $this->streetType = $streetType;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetName(): string
    {
        return $this->streetName;
    }

    /**
     * @param string $streetName
     * @return AddressDto
     */
    public function setStreetName(string $streetName): AddressDto
    {
        $this->streetName = $streetName;
        return $this;
    }

    /*** HOUSE ***/

    /**
     * @return string
     */
    public function getHouseType(): string
    {
        return $this->houseType;
    }

    /**
     * @param string $houseType
     * @return AddressDto
     */
    public function setHouseType(string $houseType): AddressDto
    {
        $this->houseType = $houseType;
        return $this;
    }

    /**
     * @return string
     */
    public function getHouseName(): string
    {
        return $this->houseName;
    }

    /**
     * @param string $houseName
     * @return AddressDto
     */
    public function setHouseName(string $houseName): AddressDto
    {
        $this->houseName = $houseName;
        return $this;
    }

    /*** LETTER ***/

    /**
     * @return string
     */
    public function getLetter(): string
    {
        return $this->letter;
    }

    /**
     * @param string $letter
     * @return AddressDto
     */
    public function setLetter(string $letter): AddressDto
    {
        $this->letter = $letter;
        return $this;
    }

    /*** DELIMITED ***/

    /**
     * @return string
     */
    public function getDelimited(): string
    {
        return $this->delimited;
    }

    /**
     * @param string $letter
     * @return AddressDto
     */
    public function setDelimited(string $delimited): AddressDto
    {
        $this->delimited = $delimited;
        return $this;
    }

    /*** EXTERNAL ***/

    /**
     * @return string
     */
    public function getExternal(): string
    {
        return $this->external;
    }

    /**
     * @param string $external
     * @return AddressDto
     */
    public function setExternal(string $external): AddressDto
    {
        $this->external = $external;
        return $this;
    }
}