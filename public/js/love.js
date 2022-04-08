console.log('hello World, Love');

function love(elem){
    console.log('function love');
    id = elem.id;
    console.log(id);
    console.log(elem);

    // child = document.createElement("p");
    // child.innerHTML = '+1'
    // child.classList.add('loveAlert');
    // elem.appendChild(child);

    elem.classList.add('loveAlert')

    setTimeout(function() {
        // child.remove();
        elem.classList.remove('loveAlert')
    }, 3000);
}