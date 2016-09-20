function modal_on(id)
{
    if($(id).length>0)  //чи завантажувалось в HTML таке вікно
    {
        $('.overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function ()
            { // после выполнения предъидущей анимации
                $(id)
                    .css('display', 'block') // убираем у модального окна display: none;
                    .animate({opacity: 1, top: '30%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
            });
    }
    else //для нового блоку modal_on не передаємо аргумент і загружаємо доступні варіанти
    {
        //загрузка аякс з бд доступні типи блоків
        if (id!=".mod-login")
        {
            //alert(id);
            var url = PATH + "api/style/getblocks";
            $.get(url, function (data) {
                var arr = JSON.parse(data);
                for (var i=0; i<arr.length; i++)
                {
                    var blck = arr[i];
                    $("#listtype").append("<li class='blckName' id="+blck.id+">"+blck.name+"</li>");
                }
                // обробка списку блоків--------------
                document.querySelector('#listtype').addEventListener('click', function(e){ // Вешаем обработчик клика на список блоків
                    var id = e.target.innerHTML; // отримали блок
                    document.querySelector('#classes').innerHTML = id; // перейменували
                    $('.ok_btn').attr('id',id); //передаємо в ID модального вікна

                });
            });
            modal_on(".mod-block"); //заново запускаємо, але вже з аргументом для викреслювання вікна
        }
    }

}


function modal_off(id)     /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
{
    $(id).animate(
        {opacity: 0, top: '25%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
        function ()
        { // после анимации
            $(this).css('display', 'none'); // делаем ему display: none;
            $('.overlay').fadeOut(400); // скрываем подложку
            $("#listtype").empty(); //очистим список
        }
    );
}




$(document).ready(function() {


    $("#logform").submit(function(event)
    {
        event.preventDefault();
        var passwd = $("#inputPasswd").val();
        var login = $("#inputLogin").val();
        var url = PATH+"api/user/login";

        /* отправляем данные методом POST */
        var posting = $.post( url, { login: login, passwd: passwd } );

        /* результат */
        posting.done(function( data )
        {
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

    $("#newsform").submit(function(event)
    {
        event.preventDefault();

        var tema = $("#inputtema").val();
        var text = $("#summernote").val();
        var id =  $('.ok_btn').attr("id");
        var date = $("#datepicker").val();

        idblock=id.replace(/[^\d;]/g, '');
        idtype=id.replace(/[^\D;]/g, '');
        idtype=idtype=="new"?"news":idtype;
        idblock=idblock==""?"new":idblock; //замовчування

        //alert(idtype+"  "+idblock);

        var url = PATH+"api/"+idtype+"/update";
        /* отправляем данные методом POST */
        if (idtype == "sticker")
        {
            var posting = $.post( url, { id: idblock, text: text, sign: tema, style: null, id_review: null } );
        }
        else
        {
            var posting = $.post( url, { id: idblock, text: text, tema: tema, date: date } );
        }


        /* результат */
        posting.done(function( data )
        {
            var id = JSON.parse(data).id;
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

    $('#modal_close, .overlay').click( function(){ // ловим клик по крестику или подложке
        modal_off('.modal'); //гасим модальне вікно.
        $('.ok_btn').attr('id',''); //передаємо в ID модального вікна
    });

    /*викликаємо форму редагування блоку*/
    $('.edit-btn').click( function(){

        var id = this.parentNode.id ;// получаем ID блоку
        var classes = this.parentNode.classList; //класс блоку

        if (id=='new')
        {
            var tema = ''; //заголовок
            var text = ''; //текст
            var date = new Date();
            var day = ("0" + date.getDate()).slice(-2);
            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var datetime =date.getFullYear()+"-"+(month)+"-"+ (day) ;
            // var modal = '.mod-block'; не присваюємо, щоб загрузити варіанти блоків modal_on перший раз
            // прокручується вхолосту не викреслюючи модальне вікно.
        }
        else
        {
            if (classes.contains('about'))
            {
                var tema = $("#" + id + " h2").text(); //заголовок
                var text = $("#" + id + " aside p").html(); //текст
                //var datetime = $("#" + id + " time").attr('datetime'); //дата
                var modal = '.mod-block';
            }
            else if (classes.contains('news'))
            {
                var tema = $("#" + id + " #h3").text(); //заголовок
                var text = $("#" + id + " #p").html(); //текст
                var datetime = $("#" + id + " time").attr('datetime'); //дата
                var modal = '.mod-block';
            }
            else if (classes.contains('slide_info'))
            {
                var tema = $("#" + id + " span").text(); //заголовок
                var text = $("#" + id + " p").html(); //текст
                var modal = '.mod-block';
            }
        }
//alert ( $('#'+id).html() );
/*
        var date = new Date(datetime);
        var day = ("0" + date.getDate()).slice(-2);
        var month = ("0" + (date.getMonth() + 1)).slice(-2);
        var date =date.getFullYear()+"-"+(month)+"-"+ (day) ;
*/

        /*передача в модальне вікно даних*/
        $('#datepicker').val(datetime);
        $("#inputtema").val(tema);
        //$("#summernote").val(text);
        /*$( "#datepicker" ).datepicker({
            setDate: datetime
        });*/
        $('#summernote').jqteVal(text);
        $('#classes').text(classes);
        $('.ok_btn').attr('id',id); //передаємо в ID модального вікна

        if (id) {
            modal_on(modal);
        }
    });


    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });

    $("#summernote").jqte();//завантажую редактор

});

modal_on(".mod-login");







