console.log('hello World, Share');

function share(id){
    console.log('Share share');
    id = id.id;

    root = document.cookie;
    root = root.split(';');
    root = root[2].split('=');
    root = root[1];
    root = decodeURIComponent(root);

    link = root + '/see/' + id;
    navigator.clipboard.writeText(link);
    
    console.log(link);
    alert('link sarable copy to clipboard : ' + link);
}