var gain = false;

function debug() {
    score += 1000000;
    document.getElementById("score").innerHTML = score;
}

function debug2() {
    score = 0;
    document.getElementById("score").innerHTML = score;
}

function clic() {
    let augmente = croissance2 * 1;
    score += augmente;
    document.getElementById("score").innerHTML = score;
    document.getElementById("sauvegarde").value = score;
}

function passif() {
    if(gain == false) {
        gain = true;
        setInterval(function () {
            score += croissance;
            document.getElementById("score").innerHTML = score;
            document.getElementById("sauvegarde").value = score;
        }, 1000);
    }
}

function bonus1() {
    if(score >= prixbonus1) {
        croissance += 3;
        score -= prixbonus1;
        prixbonus1 *= 2;
        document.getElementById("score").innerHTML = score;
        document.getElementById("sauvegarde").value = score;
        document.getElementById("bonus1").innerHTML = "🏁 " + prixbonus1 + "km";
        document.getElementById("hidden_prixbonus1").value = prixbonus1;
        document.getElementById("hidden_croissance").value = croissance;
        if(dernierbonus < 1) {
            document.getElementById("voiture").src = "images/bonus1.jpg";
            var audio1 = new Audio("audio/bonus1.mp3");
            audio1.play();
            dernierbonus = 1;
        }
        document.getElementById("hidden_dernierbonus").value = dernierbonus;
    } else {
        alert("Vous n\'avez pas assez de score.");
    }
}

function bonus2() {
    if(score >= prixbonus2) {
        croissance2 *= 2;
        score -= prixbonus2;
        prixbonus2 *= 4;
        document.getElementById("score").innerHTML = score;
        document.getElementById("sauvegarde").value = score;
        document.getElementById("bonus2").innerHTML = "💨 " + prixbonus2 + "km";
        document.getElementById("hidden_prixbonus2").value = prixbonus2;
        document.getElementById("hidden_croissance2").value = croissance2;
        if(dernierbonus < 2) {
            document.getElementById("voiture").src = "images/bonus2.jpg";
            var audio2 = new Audio("audio/bonus2.mp3");
            audio2.play();
            dernierbonus = 2;
        }
        document.getElementById("hidden_dernierbonus").value = dernierbonus;
    } else {
        alert("Vous n\'avez pas assez de score.");
    }
}

function bonus3() {
    if(score >= prixbonus3) {
        croissance *= 2;
        score -= prixbonus3;
        prixbonus3 *= 5;
        document.getElementById("score").innerHTML = score;
        document.getElementById("sauvegarde").value = score;
        document.getElementById("bonus3").innerHTML = "🛣️ " + prixbonus3 + "km";
        document.getElementById("hidden_prixbonus3").value = prixbonus3;
        document.getElementById("hidden_croissance").value = croissance;
        if(dernierbonus < 3) {
            document.getElementById("voiture").src = "images/bonus3.jpg";
            var audio3 = new Audio("audio/bonus3.mp3");
            audio3.play();
            dernierbonus = 3;
        }
        document.getElementById("hidden_dernierbonus").value = dernierbonus;
    } else {
        alert("Vous n\'avez pas assez de score.");
    }
}

function bonus4() {
    if(score >= prixbonus4) {
        croissance2 *= 10;
        score -= prixbonus4;
        prixbonus4 *= 12;
        document.getElementById("score").innerHTML = score;
        document.getElementById("sauvegarde").value = score;
        document.getElementById("bonus4").innerHTML = "🚚 " + prixbonus4 + "km";
        document.getElementById("hidden_prixbonus4").value = prixbonus4;
        document.getElementById("hidden_croissance2").value = croissance2;
        if(dernierbonus < 4) {
            document.getElementById("voiture").src = "images/bonus4.jpg";
            var audio4 = new Audio("audio/bonus4.mp3");
            audio4.play();
            dernierbonus = 4;
        }
        document.getElementById("hidden_dernierbonus").value = dernierbonus;
    } else {
        alert("Vous n\'avez pas assez de score.");
    }
}

function bonus5() {
    if(score >= prixbonus5) {
        croissance *= 10;
        score -= prixbonus5;
        prixbonus5 *= 30;
        document.getElementById("score").innerHTML = score;
        document.getElementById("sauvegarde").value = score;
        document.getElementById("bonus5").innerHTML = "🌍 " + prixbonus5 + "km";
        document.getElementById("hidden_prixbonus5").value = prixbonus5;
        document.getElementById("hidden_croissance").value = croissance;
        if(dernierbonus < 5) {
            document.getElementById("voiture").src = "images/bonus5.jpg";
            var audio5 = new Audio("audio/bonus5.mp3");
            audio5.play();
            dernierbonus = 5;
        }
        document.getElementById("hidden_dernierbonus").value = dernierbonus;
    } else {
        alert("Vous n\'avez pas assez de score.");
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("score").innerHTML = score;
    document.getElementById("sauvegarde").value = score;
    document.getElementById("bonus1").innerHTML = "🏁 " + prixbonus1 + "km";
    document.getElementById("bonus2").innerHTML = "💨 " + prixbonus2 + "km";
    document.getElementById("bonus3").innerHTML = "🛣️ " + prixbonus3 + "km";
    document.getElementById("bonus4").innerHTML = "🚚 " + prixbonus4 + "km";
    document.getElementById("bonus5").innerHTML = "🌍 " + prixbonus5 + "km";
    document.getElementById("hidden_prixbonus1").value = prixbonus1;
    document.getElementById("hidden_prixbonus2").value = prixbonus2;
    document.getElementById("hidden_prixbonus3").value = prixbonus3;
    document.getElementById("hidden_prixbonus4").value = prixbonus4;
    document.getElementById("hidden_prixbonus5").value = prixbonus5;
    document.getElementById("hidden_croissance").value  = croissance;
    document.getElementById("hidden_croissance2").value = croissance2;
    document.getElementById("hidden_dernierbonus").value = dernierbonus;

    const images = ["images/voitur.png", "images/bonus1.jpg", "images/bonus2.jpg",
                    "images/bonus3.jpg", "images/bonus4.jpg", "images/bonus5.jpg"];
    document.getElementById("voiture").src = images[dernierbonus];

    if(croissance > 0) {
        gain = true;
        setInterval(function() {
            score += croissance;
            document.getElementById("score").innerHTML = score;
            document.getElementById("sauvegarde").value = score;
        }, 1000);
    }
});