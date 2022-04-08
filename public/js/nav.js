console.log('hello-World, Nav');

const nava = document.querySelectorAll('.nava');
console.log(nava);

nava.forEach(element => {
    var line = new Image();
    line.src = 'images/underline.png';

    element.addEventListener('mouseenter', event => {
        // console.log(element);
        element.appendChild(line);
    });

    element.addEventListener('mouseout', event =>{ 
        // console.log('remove');  
        element.removeChild(line);
    });
});