<!--
    creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.

    //*Milestone 1 [✔]
    Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per 
    generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
    Scriviamo tutto (logica e layout) in un unico file index.php

    //*Milestone 2 [✔]
    Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
    
    // Milestone 3 (BONUS)
    Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
    
    // Milestone 4 (BONUS)
    Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
    Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.

-->


<?php require_once __DIR__ . '/partials/functions.php'; ?>

<?php
$passwordLength = isset($_GET['counter']) ? $_GET['counter'] : 5;

$optArray = array(
    'upper_option' => implode(range('A', 'Z')),
    'lower_option' => implode(range('a', 'z')),
    'numbers_option' => implode(range('0', '9')),
    'special_option' => implode(range('!', '+'))
);

$filteredArray = [];
foreach ($optArray as $key => $value) {
    isset($_GET[$key]) ? $filteredArray[] = $value : null;
};

if ($passwordLength > 5) {
    session_start();
    $_SESSION['passLength'] = $passwordLength;
    $_SESSION['filter'] = $filteredArray;

    header('Location: ./return.php');
};

var_dump($filteredArray);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Password Generator</title>
</head>

<body class="bg-yellow-100">
    <header class="bg-amber-400">
        <img class="w-24 absolute top-2 left-[200px] opacity-70" src="https://pngimg.com/d/bee_PNG74646.png" alt="">
        <!-- <img class="w-24 absolute top-10 right-36" src="https://pngimg.com/d/bee_PNG74646.png" alt=""> -->
        <h1 class="py-10 text-center text-gray-700 text-3xl font-extrabold drop-shadow-xl">Password Generator 🔒</h1>
    </header>

    <form class="max-w-xs mx-auto mt-24 flex flex-col justify-center items-center" method="GET">
        <div class="flex items-center justify-center">

            <input id="counter" min="5" name="counter" value="<?php echo $passwordLength ?>" type="number" class="w-12 mx-4 text-3xl text-center font-extrabold focus:outline-offset-2 focus:outline-amber-600 focus:outline [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-transparent rounded-md" />

        </div>

        <!-- slider -->
        <div class="p-6 w-full max-w-md ">
            <div class="mb-2">
                <label for="price-range" class="block text-gray-800 font-bold mb-2 text-center">Password length</label>
                <input type="range" name="range" id="password-range" class="w-full accent-amber-600" min="5" max="64" value="5">
            </div>
            <div class="flex justify-between text-gray-500">
                <span id="minLength">5</span>
                <span id="maxLength">64</span>
            </div>
        </div>
        <button class="p-2 text-gray-800 font-bold bg-amber-400 hover:bg-amber-600 rounded-md shadow-lg" type="submit">Generate</button>

        <!-- options -->
        <div class="mt-8">
            <ul class="w-48 flex flex-col gap-4 font-bold text-gray-800">
                <li class="p-2 flex items-center justify-between border-2 border-amber-300 bg-white rounded-md">
                    <span>A-Z</span>
                    <div class="inline-flex items-center">
                        <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="custom">
                            <input checked name="upper_option" type="checkbox" class="peer relative appearance-none w-5 h-5 border-2 rounded-md border-amber-400 cursor-pointer transition-all before:content[''] before:block before:bg-blue-gray-500 before:w-12 before:h-12 before:rounded-full before:absolute before:top-2/4 before:left-2/4 before:-translate-y-2/4 before:-translate-x-2/4 before:opacity-0 hover:before:opacity-10 before:transition-opacity checked:bg-amber-400 checked:border-amber-400 checked:before:bg-amber-400" id="upper_option" /><span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                <i class="fa-solid fa-asterisk"></i>
                            </span>
                        </label>
                    </div>
                </li>

                <li class="p-2 flex items-center justify-between border-2 border-amber-300 bg-white rounded-md">
                    <span>a-z</span>
                    <div class="inline-flex items-center">
                        <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="custom">
                            <input name="lower_option" type="checkbox" class="peer relative appearance-none w-5 h-5 border-2 rounded-md border-amber-400 cursor-pointer transition-all before:content[''] before:block before:bg-blue-gray-500 before:w-12 before:h-12 before:rounded-full before:absolute before:top-2/4 before:left-2/4 before:-translate-y-2/4 before:-translate-x-2/4 before:opacity-0 hover:before:opacity-10 before:transition-opacity checked:bg-amber-400 checked:border-amber-400 checked:before:bg-amber-400" id="custom" /><span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                <i class="fa-solid fa-asterisk"></i>
                            </span>
                        </label>
                    </div>
                </li>

                <li class="p-2 flex items-center justify-between border-2 border-amber-300 bg-white rounded-md">
                    <span>0-9</span>
                    <div class="inline-flex items-center">
                        <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="custom">
                            <input name="numbers_option" type="checkbox" class="peer relative appearance-none w-5 h-5 border-2 rounded-md border-amber-400 cursor-pointer transition-all before:content[''] before:block before:bg-blue-gray-500 before:w-12 before:h-12 before:rounded-full before:absolute before:top-2/4 before:left-2/4 before:-translate-y-2/4 before:-translate-x-2/4 before:opacity-0 hover:before:opacity-10 before:transition-opacity checked:bg-amber-400 checked:border-amber-400 checked:before:bg-amber-400" id="custom" /><span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                <i class="fa-solid fa-asterisk"></i>
                            </span>
                        </label>
                    </div>
                </li>

                <li class="p-2 flex items-center justify-between border-2 border-amber-300 bg-white rounded-md">
                    <span>!@#$%^&*</span>
                    <div class="inline-flex items-center">
                        <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="custom">
                            <input name="special_option" type="checkbox" class="peer relative appearance-none w-5 h-5 border-2 rounded-md border-amber-400 cursor-pointer transition-all before:content[''] before:block before:bg-blue-gray-500 before:w-12 before:h-12 before:rounded-full before:absolute before:top-2/4 before:left-2/4 before:-translate-y-2/4 before:-translate-x-2/4 before:opacity-0 hover:before:opacity-10 before:transition-opacity checked:bg-amber-400 checked:border-amber-400 checked:before:bg-amber-400" id="custom" /><span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                <i class="fa-solid fa-asterisk"></i>
                            </span>
                        </label>
                    </div>
                </li>
            </ul>
        </div>

        <div>
            <?php if ($passwordLength < 5) { ?>
                <p class="mt-10 text-xl text-center text-gray-600 dark:text-gray-500 font-extrabold drop-shadow-xl">Please, choose password's length!</p>
            <?php } else { ?>
                <p class="mt-10 text-xl text-center text-amber-600 dark:text-amber-500 font-extrabold drop-shadow-xl"><span class="font-medium">Alright!</span> Password generated!</p>
            <?php } ?>
        </div>

    </form>




    <script>
        //numero max di caratteri
        // let pwMaxLength = document.getElementById('password-range').value;

        const inputs = [...document.querySelectorAll("input")];
        inputs.forEach((inp, i) => inp.addEventListener("input", () =>
            inputs[1 - i].value = inputs[i].value))

        // const counterEl = document.getElementById('counter');

        // const decrementBtn = document.getElementById('decrement-btn');
        // const incrementBtn = document.getElementById('increment-btn');
        // let count = 0;

        // decrementBtn.addEventListener('click', () => {
        //     if (count > 1) {
        //         count--;
        //         counterEl.setAttribute('value', count);
        //     }
        // });

        // incrementBtn.addEventListener('click', () => {
        //     if (count < 12) {
        //         count++;
        //         counterEl.setAttribute('value', count);
        //     }
        // });


        // console.log(pwMaxLength);
    </script>
</body>


</html>