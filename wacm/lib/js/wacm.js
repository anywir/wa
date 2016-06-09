function modlogin(id)
{
    if($(id).length>0)  //чи завантажувалось таке вікно
    {
        $('.overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function () { // после выполнения предъидущей анимации
                $('.mod-login')
                    .css('display', 'block') // убираем у модального окна display: none;
                    .animate({opacity: 1, top: '30%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
            });
    }
}




$(document).ready(function() {


    $("#logform").submit(function(event)
    {
        event.preventDefault();
        var passwd = $("#inputPasswd").val();
        var login = $("#inputLogin").val();
        var url = PATH+"api/user/login";
        //alert(passwd+login);
        /* отправляем данные методом POST */
        
        var posting = $.post( url, { login: login, passwd: passwd } );

        /* результат */
        posting.done(function( data ) {
            var id = JSON.parse(data).id;
            //alert("TYPE - "+id);
            if (id>0)
            {
                location.reload(true) //якщо увійшли, заново завантажуємо сторінку
            }
            else
            {
                $('#alert').text("ERROR? ");
            }
        });

    });
    /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
    $('#modal_close, .overlay').click( function(){ // ловим клик по крестику или подложке
        $('.mod-login')
            .animate({opacity: 0, top: '25%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
            function(){ // после анимации
                $(this).css('display', 'none'); // делаем ему display: none;
                $('.overlay').fadeOut(400); // скрываем подложку
            }
        );
    });
});

modlogin(".mod-login");





