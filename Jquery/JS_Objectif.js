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



     /*$('.iconObjectif').on('click',function(){
     $(this).attr('src', $(this).attr('src').replace('.png', 'Activ.png'));


});*/






$('.iconObjectif').mouseout(function(){
  $(this).attr('src', $(this).attr('src').replace('Activ.png', '.png'));
      });

//Cet évènement se déclenche lorsque l'utilisteur positionne le curseur de la souris au dessus d'un élement.

$('.iconObjectif').mouseover(function(){
  $(this).attr('src', $(this).attr('src').replace('.png', 'Activ.png'));
});







$('.iconObjectif').click(function(){

		if(parseInt(etat)==0){

      $(this).attr('src', $(this).attr('src').replace('.png', 'Activ.png'));
			etat=1;
		}
		else{
      $(this).attr('src', $(this).attr('src').replace('Activ.png', '.png'));
			etat=0;
		}
	});














}
