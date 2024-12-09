function main_course() {    
    let hide = [
        document.getElementById("dessert-heading"), 
        document.getElementById("dessert-grid"),
        document.getElementById("beverage-heading"), 
        document.getElementById("beverage-grid")
    ];

    let show = [
        document.getElementById("main-heading"), 
        document.getElementById("main-grid"),
    ];

    for (let element of hide) {
        element.style.display = "none";
    }

    for (let element of show) {
        element.style.display = "block";
    }
}

function dessert() {
    let hide = [
        document.getElementById("main-heading"), 
        document.getElementById("main-grid"),
        document.getElementById("beverage-heading"), 
        document.getElementById("beverage-grid")
    ];

    let show = [
        document.getElementById("dessert-heading"), 
        document.getElementById("dessert-grid"),
    ];

    for (let element of hide) {
        element.style.display = "none";
    }

    for (let element of show) {
        element.style.display = "block";
    }
}


function beverage() {
    let hide = [
        document.getElementById("main-heading"), 
        document.getElementById("main-grid"),
        document.getElementById("dessert-heading"), 
        document.getElementById("dessert-grid")
    ];

    let show = [
        document.getElementById("beverage-heading"), 
        document.getElementById("beverage-grid")
    ];

    for (let element of hide) {
        element.style.display = "none";
    }

    for (let element of show) {
        element.style.display = "block";
    }
}