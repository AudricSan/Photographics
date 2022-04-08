console.log('hello World, Share');

function share(id){
    console.log('Share share');
    id = id.id;
    link = 'http://127.0.0.111/see/' + id;
    navigator.clipboard.writeText(link);
    alert('link sarable copy to clipboard');
}