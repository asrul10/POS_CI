$(document).ready(function () {
    var url = window.location;
    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
    $('ul.nav a').filter(function() {
         return this.href == url;
    }).parent().addClass('active');

    $('.dropdown-menu li.active').filter(function(){
     $('li.dropdown').addClass('active');
    });
});

$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})

$('#kode').keyup(function() {
    pewaktu();
});

function pewaktu(){
    setTimeout(function(){
      $('#form').submit();
    }, 700);
}
