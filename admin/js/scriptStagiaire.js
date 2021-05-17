
$('document').ready(function(e){
    $('#addStage').on('submit',function(e){
        e.preventDefault();
        var nom=$('#nom').val();
        var postnom=$('#postnom').val();
        var email=$('#email').val();
        var username=$('#username').val();
        var sexe=$('#sexe').val();
        var institution=$('#institution').val();
        var ville=$('#ville').val();
        var commune=$('#commune').val();
        var quartier=$('#quartier').val();
        var avenu=$('#avenu').val();
        var datedebut=$('#datedebut').val();
        var datefin=$('#datefin').val();

        if (nom !="" && postnom !="" && email !="" && username !="" && postnom !="" && sexe !="" && institution !="" && ville !="" && commune !="" && quartier !="" && datedebut !="" && datefin !="" && avenu !="") {
            $.ajax({
                url:"insertStage.php",
                method:"POST",
                data:{
                    nom:nom,
                    postnom:postnom,
                    email:email,
                    username:username,
                    sexe:sexe,
                    institution:institution,
                    ville:ville,
                    commune:commune,
                    quartier:quartier,
                    avenu:avenu,
                    datedebut:datedebut,
                    datefin:datefin,
                },
                dataType:"text",
                success:function(data){
                    if (data==0) {
                        alert("il existe");
                    }else{
                        alert("inserer avec succes");
                        $('#nom').val("");
                        $('#postnom').val("");
                        $('#email').val("");
                        $('#username').val("");
                        $('#sexe').val("");
                        $('#institution').val("");
                        $('#ville').val("");
                        $('#commune').val("");
                        $('#quartier').val("");
                        $('#avenu').val("");
                        $('#datedebut').val("");
                        $('#datefin').val("");
                    }
                }
            });
        }
    });
});