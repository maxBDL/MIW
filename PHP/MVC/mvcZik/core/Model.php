<?php

class Model
{
    public $bdd;

    /**
     * StreamerModel constructor va peupler les valeur de l'objet
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->bdd = self::getBdd();
        $this->fill($data);
    }

    public static function getBdd()
    {
        return SPDO::getPdoInstance();
    }

    public function fill($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}