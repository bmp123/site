$(document).ready(function(){
    //Обработчик потери фокуса
    $('input#log, input#email, input#pass, input#pass2').unbind().blur( function(){
        //Записываем обращение к атрибуту и значения полей в переменную
        var id = $(this).attr('id');
        var val = $(this).val();
        //После потери фокуса ищим что это
        switch(id)
        {                
                case 'log':
                var rv_log = /^[a-zA-Z]+$/;
                if(val.length > 6 && val.length < 20 && val !== '' && rv_log.test(val))
                {
                    $(this).addClass('not_error');
                    $(this).next('#error-box').text('dsfasfasfdsfdsfsd')
     .css('color','green')
     .animate({'paddingLeft':'10px'},400)              .animate({'paddingLeft':'5px'},400);
                }
                else
                {
                   $(this).removeClass('not_error').addClass('error');
                   $(this).next('#error-box').html('введите от 6-20 английских букв')
                                              .css('color','red')
                                              .animate({'paddingLeft':'10px'},400)
                                              .animate({'paddingLeft':'5px'},400); 
                }break;
                
                case 'pass':
                var rv_pass = /^[a-zA-Z0-9]+$/;
                if(val.length > 6 && val.length < 20 && val != '' && rv_pass.test(val))
                {
                    $(this).addClass('not_error');
                    $(this).next('#error-box').text('adfsafsdfsdfdsfsd')
     .css('color','green')
     .animate({'paddingLeft':'10px'},400)              .animate({'paddingLeft':'5px'},400);
                }
                else
                {
                   $(this).removeClass('not_error').addClass('error');
                   $(this).next('.error-box').html('пароль должен состоять из 6-20 английских букв или цифр')
                                              .css('color','red')
                                              .animate({'paddingLeft':'10px'},400)
                                              .animate({'paddingLeft':'5px'},400); 
                }break;
                case 'pass2':
                var rv_pass2 = /^[a-zA-Z0-9]+$/;
                if(val.length > 6 && val.length < 20 && val != '' && pass2.val() = pass.val())
                {
                    $(this).addClass('not_error');
                    $(this).next('.error-box').text('afdfadsff')
     .css('color','green')
     .animate({'paddingLeft':'10px'},400)              .animate({'paddingLeft':'5px'},400);
                }
                else
                {
                   $(this).removeClass('not_error').addClass('error');
                   $(this).next('.error-box').html('пароли не совподают')
                                              .css('color','red')
                                              .animate({'paddingLeft':'10px'},400)
                                              .animate({'paddingLeft':'5px'},400); 
                }break;
                 
    case 'email':
               var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
               if(val != '' && rv_email.test(val))
               {
                  $(this).addClass('not_error');
                  $(this).next('.error-box').text('Правильно')
                                            .css('color','green')
                                            .animate({'paddingLeft':'10px'},400)
                                            .animate({'paddingLeft':'5px'},400);
               }
               else{
                  $(this).removeClass('not_error').addClass('error');
                  $(this).next('.error-box').html('поле "Email" обязательно для заполнения<br>, поле должно содержать правильный email-адрес<br>')
                                             .css('color','red')
                                             .animate({'paddingLeft':'10px'},400)
                                             .animate({'paddingLeft':'5px'},400);
                                                  
           break;
                                                  }
                                                  }
                                                  });
                                                  $('form#registrat').submit(function(e){
                      e.preventDefault();
                      if($('.not_error').length == 3)
                      {
                          $.ajax({
                              url:'../registration/index.php',
type: 'post',
data: $(this).serialize(),
                              
beforeSend: function(xhr, textStatus){
    $('form#registrat :input').attr('disabled','disabled');
},
 success: function(response){
                        $('form#registrat :input').removeAttr('disabled');
                        $('form#registrat :text').val('').removeClass().next('#error-box').text('');
                        alert(response);
 }
                          });
                      }else{
                          return false;}
                  });
               });