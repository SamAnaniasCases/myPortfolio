/* Dice Rolling and Bouncing System */
const dice = document.querySelector('.dice-container');
const diceWrapper = document.querySelector('.dice-wrapper');
const rollBtn = document.querySelector('.roll');
const wordDisplay = document.querySelector('.word-display');
const words = ["Hello!", "Musta!", "Bonjour!", "Ohayoo!", "Hola!", "Ni Hao!", "Konnichiwa!", "Namaste!"];

let shuffleInterval;
let isRolling = false;

// Accumulate rotations for continuous forward spinning
let currentX = 0;
let currentY = 0;
let currentZ = 0;

// Persistent 3D tilt offset (keeps the dice 3D even when idle)
const baseTiltX = -12;
const baseTiltY = 14;
const baseTiltZ = 4;

// Apply initial 3D tilt on script load
if (dice) {
    dice.style.transform = `rotateX(${baseTiltX}deg) rotateY(${baseTiltY}deg) rotateZ(${baseTiltZ}deg)`;
}

const randomDice = () => {
    if (isRolling) return;
    isRolling = true;

    const random = Math.floor(Math.random() * 6) + 1;
    rollDice(random);
};

const rollDice = random => {
    // Trigger the bounce and shadow keyframe animations
    if (diceWrapper) {
        diceWrapper.classList.remove('rolling');
        // Force reflow to restart CSS animations
        void diceWrapper.offsetWidth;
        diceWrapper.classList.add('rolling');
    }

    // Determine target rotation for each face
    let targetX = 0;
    let targetY = 0;

    switch(random) {
        case 1: // Front
            targetX = 0;
            targetY = 0;
            break;
        case 2: // Top
            targetX = -90;
            targetY = 0;
            break;
        case 3: // Left
            targetX = 0;
            targetY = 90;
            break;
        case 4: // Right
            targetX = 0;
            targetY = -90;
            break;
        case 5: // Bottom
            targetX = 90;
            targetY = 0;
            break;
        case 6: // Back
            targetX = 180;
            targetY = 0;
            break;
    }

    // Generate random extra spins (3 to 5 full spins)
    const spinX = (Math.floor(Math.random() * 3) + 3) * 360;
    const spinY = (Math.floor(Math.random() * 3) + 3) * 360;
    const spinZ = (Math.floor(Math.random() * 3) + 3) * 360;

    // Calculate new absolute rotations (always spin forward)
    const newX = Math.ceil(currentX / 360) * 360 + targetX + spinX;
    const newY = Math.ceil(currentY / 360) * 360 + targetY + spinY;
    const newZ = currentZ + spinZ;

    // Update current rotations
    currentX = newX;
    currentY = newY;
    currentZ = newZ;

    // Apply the 3D rotation transform with the base tilt offset
    dice.style.transform = `rotateX(${newX + baseTiltX}deg) rotateY(${newY + baseTiltY}deg) rotateZ(${newZ + baseTiltZ}deg)`;

    // Shuffle the words display during rotation
    clearInterval(shuffleInterval);
    shuffleInterval = setInterval(() => {
        const randomWord = words[Math.floor(Math.random() * words.length)];
        wordDisplay.textContent = randomWord;

        wordDisplay.classList.add("fade");
        setTimeout(() => wordDisplay.classList.remove("fade"), 100);
    }, 150);

    // Stop shuffling and settle after roll completion (1.8s)
    setTimeout(() => {
        clearInterval(shuffleInterval);

        const finalWord = words[Math.floor(Math.random() * words.length)];
        wordDisplay.textContent = finalWord;

        if (diceWrapper) {
            diceWrapper.classList.remove('rolling');
        }

        isRolling = false;
    }, 1800);
};

if (rollBtn) {
    rollBtn.addEventListener('click', randomDice);
}