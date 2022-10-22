<?php
echo "<link rel='stylesheet' href='style.css'>\n";
$films = [
    [
        "producer" => "Питер Джексон",
        $motions1 = [
            $motion1 = [
                "name" => "Властелин колец",
                "year" => 2001
            ],
            $motion2 = [
                "name" => "Кинг Конг",
                "year" => 2005
            ],
            $motion3 = [
                "name" => "Страшилы",
                "year" => 1996
            ]
        ]
    ],
    [
        "producer" => "Леонид Гайдай",
        $motions2 = [
            $motion4 = [
                "name" => "Кавказская пленница",
                "year" => 1967
            ],
            $motion5 = [
                "name" => "Бриллиантовая рука",
                "year" => 1969
            ],
            $motion6 = [
                "name" => "Иван Васильевич меняет профессию",
                "year" => 1973
            ]
        ]
    ],
    [
        "producer" => "Джеймс Кэмерон",
        $motions3 = [
            $motion7 = [
                "name" => "Терминатор",
                "year" => 1984
            ],
            $motion8 = [
                "name" => "Бездна",
                "year" => 1989
            ],
            $motion9 = [
                "name" => "Титаник",
                "year" => 1997
            ]
        ]
    ]
];

echo "<table>";
echo "<tr><th>Режиссёр</th><th>Фильмы</th><th>Год выпуска</th></tr>";
function output($value1, $key1)
{
    foreach ($value1 as $key2 => $value2) {
        echo "<tr>";
        if (!is_array($value2)) {
            echo "<td rowspan='4'>$value2</td>\n";
        }
        if (is_array($value2)) {
            foreach ($value2 as $key3 => $value3) {
                foreach ($value3 as $key4 => $value4) {
                    echo "<td>$value4</td>\n";
                }
                echo "</tr>";
            }
            echo "\n";
        }
    }
}

$seach_result1 = array_flip(search($films, "а"));
$seach_result2 = array_intersect_key($films, $seach_result1);
array_walk($seach_result2, "output");
echo "</table>\n";

function search($films, $data)
{
    $result = array();
    foreach ($films as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
            if (!is_array($value2)) {
                if (stristr($value2, $data)) {
                    $result[] = $key1;
                }
            }
            if (is_array($value2)) {
                foreach ($value2 as $key3 => $value3) {
                    foreach ($value3 as $key4 => $value4) {
                        if (strstr($value4, $data)) {
                            $result[] = $key1;
                        }
                    }
                }
            }
        }
    }
    if (count($result) == 0) {
        print "По вашему запросу ничего не найдено(";
    }
    return array_unique($result);
}
