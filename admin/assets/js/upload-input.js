const imageInput = document.getElementById("file");
imageInput.onchange = () => {
    // console.log("woow");
    const span = document.getElementById("file-span");
    span.innerText = "";
    span.innerText = imageInput.files[0].name;
} 

const coverimageInput = document.getElementById("cover_file");
coverimageInput.onchange = () => {
    // console.log("woow");
    const spans = document.getElementById("file-spans");
    spans.innerText = "";
    spans.innerText = coverimageInput.files[0].name;
} 