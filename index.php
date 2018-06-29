<?php

echo '<h3>Пространство имен</h3>';
echo '<p>Пространство имен - модель группировки имен, позволяющая создавать или использовать в коде классы,
    функции и константы с одинаковыми именами, но находящиеся в разных пространствах имен. Такая модель схожа с моделью
    построения директорий файловой системы, когда два файла с одинаковым именем не могут существовать в одной папке,
    но могут - если они лежат в разных. В PHP задается в самой верхней строке кода namespace Name.</p>';
echo '<h3>Исключения</h3>';
echo '<p>Исключения - механизм, позволяющий обрабатывать любые ошибки программы так, как нам необходимо. В ходе выполнения
    программы важно отловить все возможные ошибки и обработать их соответственно, иначе программа будет давать сбой при
    возникновении не учтенной ошибки или работать не так, как нам нужно.</p><br /><br />';


spl_autoload_register(
    function($className) {
        $path = rtrim(__DIR__, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR;
        $fullPath = $path . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists($fullPath)) {
            require $fullPath;
        }
    }
);


echo '<h4>Список автомобилей:</h4>';

$subaru = new Products\Category\Car('автомобиль', 33300);
$subaru->setMake('Subaru');
$subaru->setModel('FORESTER');
$subaru->setColor('золотистый');

$renault = new Products\Category\Car('автомобиль', 20300);
$renault->setMake('Renault');
$renault->setModel('DUSTER');
$renault->setColor('розовый');

$subaru->printFullDescription();
echo '<br />';
$renault->printFullDescription();
echo '<br /><br />';


echo '<h4>Список теливизоров:</h4>';

$samsung = new Products\Category\TV('телевизор', 550);
$samsung->setMake('Samsung');
$samsung->setModel('UE40J5200');
$samsung->setSize(40);

$philips = new Products\Category\TV('телевизор', 600);
$philips->setMake('Philips');
$philips->setModel('49PFS5301');
$philips->setSize(43);

$samsung->printFullDescription();
echo '<br />';
$philips->printFullDescription();
echo '<br /><br />';


echo '<h4>Список ручек:</h4>';

$duke = new Products\Category\Pen('шариковая ручка', 40);
$duke->setInk('черный');
$duke->setMake('Duke');
$duke->setModel('Mentor pen-619R');

$picasso = new Products\Category\Pen('шариковая ручка', 45);
$picasso->setInk('синий');
$picasso->setMake('Picasso');
$picasso->setModel('925 925-R');

$duke->printFullDescription();
echo '<br />';
$picasso->printFullDescription();
echo '<br /><br />';


echo '<h4>Породы уток:</h4>';

$duckDonald = new Products\Category\Duck('утка', '10');
$duckDonald->setSpecies('белая в тельняшке');
$duckDonald->setName('Мулард');

$duckDaffy = new Products\Category\Duck('утка', '12');
$duckDaffy->setSpecies('черная с желтыми лапами');
$duckDaffy->setName('Турпан');

$duckDonald->printFullDescription();
echo '<br />';
$duckDaffy->printFullDescription();
echo '<br /><br />';

echo 'Количество созданных объектов: '.Products\Product::$staticProperty;
echo '<br /><br /><br />';



$basket = new Products\Basket();
$basket[] = $subaru;
$basket[] = $samsung;
$basket[] = $picasso;
$basket[] = $duckDonald;

echo "<h3>Сумма товаров в корзине: {$basket->getPriceProductsBasket()} $.</h3>";

$order = new Products\Order($basket);
$order->getInfoOrder();