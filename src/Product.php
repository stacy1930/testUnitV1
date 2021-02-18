<?php

namespace App;

use LogicException;

class Product
{
    const CLOTHE_PRODUCT = 'clothe';
    /** @var string */
    private $name;
    /** @var string */
    private $type;
    /** @var float */
    private $price;

    public function __construct(string $name, string $type, float $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }

    public function computeTva(): float
    {
        if ($this->price < 0) {
            throw new LogicException('La TVA ne peut pas être negatif');
        }
        // const = static donc SELF au lieu de this
        if (self::CLOTHE_PRODUCT === $this->type) {
            return $this->price * 0.055;
        }
        return $this->price * 0.196;
    }
}
