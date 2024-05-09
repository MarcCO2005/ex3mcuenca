


function main() {
    changeColor();
    tamañoDiv();
}

function changeColor (){
    document.getElementsByTagName('h1').addEVENTListener("click", function () {
        let abstract = document.getElementById('abstract');
        if (abstract.style.backgroundColor === "blue") {
            abstract.style.backgroundColor = "";
        } else {
            abstract.style.backgroundColor = "blue";
        }
        });
}
function tamañoDiv() {
    let fontSize = 16;
    let contador = Math.pow(fontSize, 2);
    let content = document.getElementsByTagName('h1');

    content.addEventListener("click", function () {
        if (content.style.fontSize === "2em") {
            while (fontSize < contador) {
                fontSize += 1;
                content.style.fontSize = fontSize + "px";
            }

        } else {
            content.style.fontSize = "2em";
        }
    });
}