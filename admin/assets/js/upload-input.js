const imageInput = document.getElementById("file");
imageInput.onchange = () => {
    console.log("woow");
    const span = document.getElementById("file-span");
    span.innerText = "";
    span.innerText = imageInput.files[0].name;
} 