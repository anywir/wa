function modlogin(id)
{

    $('#overlay').fadeIn(400, // ������� ������ ���������� ������ ��������
        function(){ // ����� ���������� ����������� ��������
            $('#modlogin')
                .css('display', 'block') // ������� � ���������� ���� display: none;
                .animate({opacity: 1, top: '30%'}, 200); // ������ ���������� ������������ ������������ �� ���������� ����
        });
}




$(document).ready(function() {


    $(":submit").click("input",function()
    {
        var passwd = $("#inputPasswd").val();
        alert(passwd);


    });
    /* �������� ���������� ����, ��� ������ �� �� ����� �� � �������� ������� */
    $('#modal_close, #overlay').click( function(){ // ����� ���� �� �������� ��� ��������
        $('#modlogin')
            .animate({opacity: 0, top: '25%'}, 200,  // ������ ������ ������������ �� 0 � ������������ ������� ���� �����
            function(){ // ����� ��������
                $(this).css('display', 'none'); // ������ ��� display: none;
                $('#overlay').fadeOut(400); // �������� ��������
            }
        );
    });
});

modlogin("#modlogin");