/* Dice Rolling */
const dice = document.querySelector('.dice-container');
const rollBtn = document.querySelector('.roll');
const wordDisplay = document.querySelector('.word-display');
const words = ["Hello!", "Musta!", "Bonjour!", "Ohayoo!", "Hola!", "Ni Hao!", "Konnichiwa!", "Namaste!"
];
let shuffleInterval;
let isRolling = false;



const randomDice = () => {
    if (isRolling) return;
    isRolling = true;

    const random = Math.floor(Math.random() * 6) + 1;
    rollDice(random);

}

const rollDice = random =>{
    dice.style.animation = 'rolling 3s'

    clearInterval(shuffleInterval);

    shuffleInterval = setInterval(() => {
        const randomWord = words[Math.floor(Math.random() * words.length)];
        wordDisplay.textContent = randomWord;

        wordDisplay.classList.add("fade");
        setTimeout(() => wordDisplay.classList.remove("fade"), 100);
    }, 150);

    setTimeout(() => {
        clearInterval(shuffleInterval);
        switch(random){
            case 1:
                dice.style.transform='rotateX(0deg) rotateY(0deg)';
            break;

            case 2:
                dice.style.transform='rotateX(-90deg) rotateY(0deg)';
            break;

            case 3:
                dice.style.transform='rotateX(0deg) rotateY(90deg)';
            break;

            case 4:
                dice.style.transform='rotateX(0deg) rotateY(-90deg)';
            break;

            case 5:
                dice.style.transform='rotateX(90deg) rotateY(0deg)';
            break;

            case 6:
                dice.style.transform='rotateX(180deg) rotateY(0deg)';
            break;

            default:
                break;
        }

        const finalWord = words[Math.floor(Math.random() * words.length)];
        wordDisplay.textContent = finalWord;

        dice.style.animation = 'none'

        isRolling = false;

    }, 3050);
}

rollBtn.addEventListener('click', randomDice);