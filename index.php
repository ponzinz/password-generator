<!--
    creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.

    Milestone 1
    Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per 
    generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
    Scriviamo tutto (logica e layout) in un unico file index.php

-->



<?php

function passwordGenerator($numOfChars)
{
    $bytes =  range(33, 126);
    $allChars = array_map('chr', $bytes);
    $allCharsString = implode($allChars);
    return substr(str_shuffle($allCharsString), 0, $numOfChars);
}

$passwordLength = $_GET['counter'];
var_dump(passwordGenerator($passwordLength))
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Password Generator</title>
</head>

<body class="bg-yellow-100">

    <h1 class="mt-10 text-center text-3xl font-extrabold drop-shadow-xl">Password Generator 🔒</h1>
    <form class="max-w-xs mx-auto mt-24 flex flex-col justify-center items-center">
        <div class="flex items-center justify-center">
            <div id="decrement-btn" class="flex justify-center items-center w-10 h-10 rounded-full text-text-gray-600 focus:outline-none bg-amber-400 hover:bg-amber-600 drop-shadow-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                </svg>
            </div>

            <input id="counter" name="counter" value="2" type="number" class="w-12 mx-4 text-3xl text-center font-extrabold [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-transparent" />

            <div id="increment-btn" class="flex justify-center items-center w-10 h-10 rounded-full text-text-gray-600 focus:outline-none bg-amber-400 hover:bg-amber-600 drop-shadow-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12M6 12h12"></path>
                </svg>
            </div>
        </div>


        <!-- slider -->
        <!-- <div class="p-6 w-full max-w-md">
            <div class="mb-4">
                <label for="price-range" class="block text-gray-700 font-bold mb-2 text-center">Password length</label>
                <input type="range" id="password-range" class="w-full accent-amber-600" min="2" max="12" value="8">
            </div>
            <div class="flex justify-between text-gray-500">
                <span id="minLength">2</span>
                <span id="maxLength">12</span>
            </div>
        </div> -->


        <button class="p-2 mt-10 text-gray-600 font-bold bg-amber-400 hover:bg-amber-600 rounded-md shadow-lg" type="submit">Generate</button>
        <p class="mt-10 text-sm text-amber-600 dark:text-amber-500 font-extrabold drop-shadow-xl"><span class="font-medium">Alright!</span> Password generated!</p>

    </form>




    <script>
        //numero max di caratteri
        // let pwMaxLength = document.getElementById('password-range').value;

        //
        let counterEl = document.getElementById('counter');
        const decrementBtn = document.getElementById('decrement-btn');
        const incrementBtn = document.getElementById('increment-btn');
        let count = 2;

        decrementBtn.addEventListener('click', () => {
            if (count > 2) {
                count--;
                counterEl.setAttribute('value', count);
            }
        });

        incrementBtn.addEventListener('click', () => {
            if (count < 12)
                count++;
            counterEl.setAttribute('value', count);

        });


        // console.log(pwMaxLength);
    </script>
</body>

</html>