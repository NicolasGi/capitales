<?php
mb_internal_encoding("UTF-8");
$pays = [
    'belgique' => [
        'capitale' => 'bruxelles',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_Belgium.svg'
    ],
    'france' => [
        'capitale' => 'paris',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg'
    ],
    'espagne' => [
        'capitale' => 'madrid',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/en/9/9a/Flag_of_Spain.svg'
    ],
    'pays-bas' => [
        'capitale' => 'amsterdam',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/2/20/Flag_of_the_Netherlands.svg'
    ],

    'allemagne' => [
        'capitale' => 'berlin',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/en/b/ba/Flag_of_Germany.svg'
    ],
    'russie' => [
        'capitale' => 'moscou',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/en/f/f3/Flag_of_Russia.svg'
    ],
    'angletterre' => [
        'capitale' => 'londre',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/en/b/be/Flag_of_England.svg'
    ],
    'canada' => [
        'capitale' => 'montreal',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/d/d9/Flag_of_Canada_%28Pantone%29.svg'
    ],
    'usa' => [
        'capitale' => 'washington',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg'
    ],
    'brazil' => [
        'capitale' => 'brazilia',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/en/0/05/Flag_of_Brazil.svg'
    ],
    'japon' => [
        'capitale' => 'tokyo',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/en/9/9e/Flag_of_Japan.svg'
    ],
    'corée du nord' =>[
            'capitale' => 'pyugang',
            'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/Flag_of_North_Korea.svg   '
    ]
];

$paysChoose = '';
$error = '';
$getPays = '';
if(isset($_GET['pays'])){
    $getPays = $_GET['pays'];
}

$keyArray = array_keys($pays);

if(array_key_exists($getPays, $pays)) {
    $error =  'Choisissez un bon pays';
}

function titleCase($words){
    $arrayExplode = explode(' ', $words);
    $newArray = [];
    foreach ($arrayExplode as $key){
        array_push($newArray, ucfirst($key));
    }
    $newWord = implode(' ', $newArray);
    return $newWord;
}

if (isset($_GET['pays']) && $_GET['pays'] !== '') {
        $paysChoose = $_GET['pays'];
}
$lowerCasePays = mb_strtolower($paysChoose);

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Trouvez la capitale</h2>
    <?php if($error){?>
        <p><?= $error; ?></p>
    <?php };?>
    <form action="#" method="GET">
        <select name="pays" id="pays">

            <?php if(isset($getPays) && $getPays !== ''){?>
                <option value="<?= $paysChoose ?>" ><?= mb_strtoupper($paysChoose) ?></option>
            <?php } ?>

            <?php foreach ($pays as $key => $value) : ?>
                <option value="<?= strtoupper($key)?>"><?= mb_strtoupper($key) ?></option>
            <?php endforeach; ?>

        </select>

        <input type="submit" value="Quelle est la capital ?">

        <?php if($getPays && array_key_exists(mb_strtolower($getPays), $pays)){?>

            <p><?= "la capitale de " . titleCase($lowerCasePays) ." est " . ucfirst($pays[$lowerCasePays]['capitale']); ?></p>
            <img src="<?= $pays[$lowerCasePays]['drapeau'];?>" title="<?= "Drapeau de  $paysChoose" ?> " alt="<?= "Drapeau de " . ucfirst($paysChoose);?> ">
        <?php } ?>
    </form>
</body>

</html>