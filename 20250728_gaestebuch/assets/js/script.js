let iv = ["", "", ""];

document.querySelectorAll('.form-control').forEach((e, index) => {
    e.addEventListener('keyup', (event) => {
        iv[index] = e.value;      
        console.log(iv);
        document.querySelector('button').disabled = iv.every(e => e.trim()!="") ? false: true;
    });
});
/*
let inputsNotEmpty = [false, false, false];

let inputs = document.querySelectorAll('.form-control');

inputs.forEach((element, index) => {
    element.addEventListener('keyup', (e) => {
        if(e.value == "") {
            console.log("f");
           inputsNotEmpty[index] = false; 
        } else {
            console.log("t");
            inputsNotEmpty[index] = true; 
        }

        if(inputsNotEmpty.every((e) => {
            return e==true;}
        )) {
            document.querySelector('button').disabled = false;
        } else {
            document.querySelector('button').disabled = true;
        };
    });
});
*/