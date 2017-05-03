<?php


class Truck
{


    const CAPACITY = 30000;


    private $stones = [];

    public function getStones()
    {
        return $this->stones;
    }

    /**
     * Загружает камень
     * Если груз не вмещается вернет false
     * Вернет true при удачной погрузке
     * @return bool
     */
    public function load($stone)
    {
        if ($this->getWeight() + $stone <= self::CAPACITY) {
            $this->stones[] = $stone;
            return true;
        } else {
            return false;
        }
    }


    /**
     * Возвращает текущий вес груза
     * @return number
     */
    public function getWeight()
    {
        return array_sum($this->stones);
    }

    /**
     * Разгружает грузовик
     */
    public function unload()
    {
        $this->stones = [];
    }

    /**
     * Проверяет полный ли грузовик
     * @return bool
     */
    public function isFull()
    {
        if ($this->getWeight() == self::CAPACITY) {
            return true;
        } else {
            return false;
        }
    }


}


function loading(Truck $truck, $heapOfStones)
{
    arsort($heapOfStones);

    foreach ($heapOfStones as $key => $stone) {
        if ($truck->isFull()) {
            break;
        }
        if (!$truck->load($stone)) {
            continue;
        } else {
            unset($heapOfStones[$key]);
        }
    }

    return $heapOfStones;
}


$stones = [1, 10, 2, 5, 100, 10000, 50, 500, 20000, 20000, 4000, 3000, 8000, 2, 10, 90, 5, 10000, 11000, 6000];//или любой сгенерированный массив


$truck = new Truck();


$trips = [];

do {

    $stones = loading($truck, $stones);
    $trips[] = $truck->getStones();
    $truck->unload();

} while (!empty($factoryA));

//Получаем массив с оптимальными поездками грузовика
var_dump($trips);