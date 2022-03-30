console.log('hello-World');

const nava = document.querySelectorAll('.nava');
console.log(nava);

nava.forEach(element => {
    var line = new Image();
    line.src = 'img/underline.png';

    element.addEventListener('mouseenter', event => {
        // console.log(element);
        element.appendChild(line);
    });

    element.addEventListener('mouseout', event =>{ 
        // console.log('remove');  
        element.removeChild(line);
    });
});