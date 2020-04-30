<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="./style.css" media="screen" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
    </head>
    <body>
        <div class="row">
            <div class="container border border-secondary rounded col-md-6 mb-3 mt-5">
                <form method="post" action="">
                    <div class="form-group mt-3">
                        <label for="inputname">Nome</label>
                        <input type="text" id="inputname" class="form-control" name="name" placeholder="João Antonio Scaleão Britto" required>
                    </div>
                    <div class="form-group">
                        <label for="inputemail">E-mail</label>
                        <input type="email" id="inputemail" class="form-control" name="email" placeholder="joaoscaleao@hotmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">Senha</label>
                        <input type="password" id="inputpassword" class="form-control" name="password" required>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success" id="btn" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="container col-md-6 mb-3">
                <div id="messages" class="text-center"></div>
            </div>
        </div>
        <!--

        <div class="row">
            <div class="container border border-secondary rounded col-md-6 mb-3">
                <div class="text-center pt-4 pb-3">
                    <p>Você é cadastrado? <a href="./login.html"> Faça login agora</a></p>
                </div>
            </div>
        </div>
        -->

        <script>
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
        </script>
        <script src="https://kit.fontawesome.com/1dd5e92bfc.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
