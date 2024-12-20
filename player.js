const pos = document.getElementById("position");
const GKPlayer = document.getElementById("GK-player");
const STPlayer = document.getElementById("ST-player");
console.log(STPlayer);

pos.addEventListener('change', (event) => {
    if (event.target.value === 'GK') {
        STPlayer.style.display = 'none';
        GKPlayer.style.display = 'block';

    }
});

console.log("how");
