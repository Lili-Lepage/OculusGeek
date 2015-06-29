$(window).load(start);


function start(){

var positionElementInPage = $('#menuTop').offset().top;
$(window).scroll(
function() {
if ($(window).scrollTop() &gt;= positionElementInPage) {
// fixed
$('#menuTop').addClass("floatable");
} else {
// relative
$('#menuTop').removeClass("floatable");
}
}
);
