<?php
declare(strict_types=1);

$aFunc = function () {
    return 'Hello there!';
};

function returnMeAnAmazingFunction(): callable {
    return function () {
        return 'This is an amazing function';
    };
}

function printSomething(callable $aFunction): void {
    echo $aFunction();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Dog {
    public function __invoke() {
        echo 'Woof woof';
    }
}

$franky = new Dog();
$franky(); // prints Woof woof

echo PHP_EOL;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///
class City {

    private $name;
    private $population;

    public function __construct(string $name, int $population)
    {
        $this->name = $name;
        $this->population = $population;
    }

    public function name(): string { return $this->name; }

    public function population(): int { return $this->population; }

}

/** @var City[] $topFiveItalianCities List of top 5 cities in italy*/
$topFiveItalianCities = [
    new City('Rome',  2872800),
    new City('Milan',  1366180),
    new City('Naples',  966144),
    new City('Turin',  882523),
    new City('Palermo',  668405),
];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Procedural way
$veryBigCities = [];
foreach($topFiveItalianCities as $city) {
    if ($city->population() > 1000000) {
        $veryBigCities[] = $city;
    }
}

// Functional way
$veryBigCities = array_filter($topFiveItalianCities, function (City $city) {
    return $city->population() > 1000000;
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Procedural way
$html = '<table>';
foreach ($topFiveItalianCities as $city) {
    $html .= "<tr><td>{$city->name()}</td><td>{$city->population()}</td></tr>";
}
$html .= '</table>';

// Functional way
$rowRenderer = function (string $initial, City $city): string {
    return $initial . "<tr><td>{$city->name()}</td><td>{$city->population()}</td></tr>";
};
$html = array_reduce($topFiveItalianCities, $rowRenderer, '<table>') . '</table>';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Procedural way
$citiesArray = [];
foreach($topFiveItalianCities as $city) {
    $citiesArray[] = [
        'name' => $city->name(),
        'population' => $city->population(),
    ];
}

// Functional way
$citiesArray = array_map(function (City $city): array {
    return [
        'name' => $city->name(),
        'population' => $city->population(),
    ];
}, $topFiveItalianCities);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$cityToArray = function (City $city): array {
    return [
        'name' => $city->name(),
        'population' => $city->population(),
    ];
};
$hasMoreThanAMillionInhabitants = function (City $city) {
    return $city->population() > 1000000;
};
$citiesArray = array_map($cityToArray, array_filter($topFiveItalianCities, $hasMoreThanAMillionInhabitants));

print_r($citiesArray);