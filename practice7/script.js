"use strict";

//alert("Click 'Y' to replace all images");

const infoText = document.createElement("span");
infoText.innerText = "Натисніть 'Y' щоб запустити скрипт";
infoText.style.position = "absolute";
infoText.style.left = 0;
infoText.style.top = "30px";
infoText.style.fontSize = "14px";
infoText.style.color = "red";

const container = document.querySelector(".pad-container");
infoText.style.left = container.style.left;
container.appendChild(infoText);



const src480px = "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Radiation_warning_symbol.svg/480px-Radiation_warning_symbol.svg.png";
const src1024px = "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Radiation_warning_symbol.svg/1024px-Radiation_warning_symbol.svg.png";

document.body.onkeydown = onKeyDown;
function onKeyDown(e) {
    if (e.code == "KeyY") {
        const images = document.getElementsByTagName("img");
        for (let i = 0; i < images.length; i++) {
            const img = images[i];
            const w = img.width;
            const h = img.height;

            if (w <= 480 && h <= 480) {
                img.src = src480px;
            } else {
                img.src= src1024px;
            }

            img.style.objectPosition = "50% 50%";
        }
        
        container.removeChild(infoText);
    }
}
