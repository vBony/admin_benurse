$( document ).ready(function(){
    var base_url = 'http://localhost/admin_benurse/';

    $('#notific').on('click', function(){
        if(!Notification){
            alert("Notificação não disponível!");
            return;
        }
    
        if(Notification.permission !== 'granted'){
            Notification.requestPermission();
        }
    });

    $('#geraNotifi').on('click', function(){
        var notification = new Notification('benurse está no ar!', {
            icon: 'http://localhost/adminsouenfermagem/app/assets/images/logo.jpg',
            body: 'Seja um dos primeiros a se registrar e ganhe um desconto exclusivo!'
        });

        notification.onclick = function(){
            window.open('https://localhost/adminsouenfermagem')
        }
    });
    

    $('#provas-btn').on('click', function(){
        document.location.href = base_url+'provas';
    });
});