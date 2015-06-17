window.addEventListener("load",initialisation,false);

function initialisation () {

  $('#imgSubmit').click(function () {

    console.log('coucou');

    var articleTitle = $('#articleTitle').val();
    var articleContent = $('#articleContent').val();

    if (articleTitle != '' & articleContent != '') {
      console.log($('form'));
      $('#submit').trigger('click');
    } else {
      alert('L\'un des champs n\'a pas été remplit');
    }

  });

}
