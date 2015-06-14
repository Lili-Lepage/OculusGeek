$(window).load(start);


function start(){
    //Il faut cacher les classe actu et participatif

    $('.iconObjectif').click(function(){

        //On récupere l'id de l'élement sur lequel on a cliqué (ex: actu)
        var element = $(this).attr('id');
        //Une fois qu'on a cliqué dessus
        $('.whiteArrow').removeClass('activ'); //On cache les flêches
        $('.objectifText').removeClass('activ');//On cache les textes
        //On affiche les classes égales à l'id de l'icone (ici actu)
        $('.'+element).addClass('activ'); //le "." sélectionne une classe comme en css
    });

     $('.iconObjectif').click(function(){
     $(this).attr('src', $(this).attr('src').replace('.png', 'Activ.png'));


});

/*$('.iconObjectif').onClick(function(){
$(this).attr('src', $(this).attr('src').replace('Activ.png', '.png'));


});*/












}
