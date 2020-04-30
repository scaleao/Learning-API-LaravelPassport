var n = document.getElementById('inputname');
var e = document.getElementById('inputemail');
var p = document.getElementById('inputpassword');
var btn = document.getElementById('btn');
var m = document.getElementById('messages');

btn.addEventListener('click', function(){
    var user = {
        "name"  : n.value,
        "email" : e.value,
        "password" : p.value
    }; 
    var myheaders = new Headers({
        'Content-Type': 'application/json',
        'Accept' : 'application/json'
    });
    alert(n);
    fetch('http://localhost:8000/api/register', {
        method: 'post',
        headers: myheaders,
        body: JSON.stringify(user)
        })
        .then(function(response) {
            response.json()
                .then(function(data){
    	            m.innerText = data.message;
                });
        }).catch(function(error) {
            m.innerText = error;
        });

        m.innerText = 'aguardando...';
});

/*
function startLoad(){
    var loading = document.createElement('span');
    loading.className = "fas fa-spinner rotating";
    button.appendChild(loading);
    //var loading = document.getElementById('loading');
    //loading.className = "fas fa-spinner rotating";
    
}

button.onclick = startLoad;

function endLoad(){
    var loading = document.createElement('span');
    loading.remove(loading);
}
*/