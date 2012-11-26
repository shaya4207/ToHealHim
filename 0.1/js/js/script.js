$(document).ready(function(){
  font_sizer();
});

function font_sizer(){
  $("#font-size").change(function(){
    $(".chapter").css('font-size',$(this).val() + 'px');
  });
};