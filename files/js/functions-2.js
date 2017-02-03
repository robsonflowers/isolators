$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('#myTabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('.check').checkboxpicker();
    $('.input-group.date').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "pt-BR"
    });
    $('#modalTecnico').on('shown.bs.modal', function () {
        
        $('[name="login"]').focus();
        
    });
//    $('[data-toggle="popover"]').popover({
//        trigger: 'hover',
//        html: true,
////        delay: { "show": 500, "hide": 1000 },
//        title: '<h5><a href="http://localhost/tecnet/tecnicos/N5805778/">Robson Flores</a></h5>',
//        content: ''
//    });
    $('.showPop').webuiPopover({
        title:'Detalhes do técnico',
        width:400,height:170,
        trigger:'hover',
        closeable:true,
        animation:'pop',
        arrow: true,
        padding:false,
//        type:'async',
//        url:'http://localhost/tecnet/app/ajax/JSON.php?login=N5805778',
//        content:function(){
//            var html;
//            $.getJSON('http://localhost/tecnet/app/ajax/JSON.php?login=N5805778', 
//            function(data){
//                
//                $.each(data, function(i, tecnico){
//                    return tecnico.login;
//                });
//               
//            });
//             
//        }
//          url:'http://localhost/tecnet/app/ajax/popover.php?login='+$(this).data('tecnico')
    });
    
});



$(window).resize(function() {
    var tamanhoJanela = $(window).width();
    var tamanhoSidebar = $(".sidebar").outerWidth();
    if(tamanhoJanela>768){
        $(".sidebar").removeClass("sidebar-fechado");
        $(".sidebar").css({'left':'0px'});
    }
    else{
        $(".sidebar").css({'left':"-"+tamanhoSidebar+"px"});
        $(".sidebar").addClass("sidebar-fechado");
        
    }
});
$(document).ready(function() {
    var tamanhoJanela = $(window).width();
    if(tamanhoJanela<768){
        $(".sidebar").addClass("sidebar-fechado");
    }
    else{
        $(".sidebar").removeClass("sidebar-fechado");
    }
});
$(function(){
    var hamburger = $(".hamburger");
    hamburger.on("click", function(e){
        hamburger.toggleClass("is-active");
        var tamanhoJanela = $(window).width();
        if(tamanhoJanela<768){
            var tamanhoSidebar = $(".sidebar").outerWidth();
            if($(".sidebar").hasClass("sidebar-fechado")){
                $(".sidebar").css({"left":"-"+tamanhoSidebar+"px","display":"block"}).animate({left: "0px"}, 300);
                $(".sidebar").removeClass("sidebar-fechado");
            }
            else{
                $(".sidebar").css({'left':'0px'}).animate({left: '-'+tamanhoSidebar+'px'}, 300);
                $(".sidebar").addClass("sidebar-fechado");
            }
        }
    });
});




$(function(){
   $('.cpf').mask('999.999.999-99');
   
   $('.telefone, .celular').mask('(99) 9999-9999');
   
});

var SITE = SITE || {};
 
SITE.fileInputs = function() {
  var $this = $(this),
      $val = $this.val(),
      valArray = $val.split('\\'),
      newVal = valArray[valArray.length-1],
      $button = $this.siblings('.button');
  if(newVal !== '') {
    $button.text(newVal);
  }
};



$(function() {
    $('.visualizar').hover(
        function(){
            $(this).find('.visualizar-valor').hide();
            $(this).find('.visualizar-conteudo').show();
        }, 
        function(){ 
            $(this).find('.visualizar-valor').show();
            $(this).find('.visualizar-conteudo').hide();
        }
    );
});

function SomaTotal(){
    var total = 0;
    $(".seleciona-quantidade").each(function(){
        total = total + Number($(this).val());
    });
    $(".soma-quantidade").text(total);
};




$(function(){
    $('.simple-switch-input').on('change',function(){
        var v = $(this).parents().next('.cadeado');
        var id_usuario = $(this).data('id-usuario');
        var status = $(this).prop('checked');
        var acao;
        if(status==true){
            acao = 1;
        }
        if(status==false){
            acao = 2;
        }
        $.ajax({ 
            type: 'GET',
            dataType: 'html', 
            url: 'http://localhost/tecnet/?page=tecnicos&editar=gerenciar-tecnicos&id-usuario='+id_usuario,
            async: true,
            data: 'status-usuario='+acao,
            success: function() {
                if(v.hasClass('icon_lock-open_alt')){
                    v.removeClass('icon_lock-open_alt');
                    v.addClass('icon_lock_alt').css({'color':'lightcoral'});
                }
                else{
                    v.removeClass('icon_lock_alt');
                    v.addClass('icon_lock-open_alt').css({'color':'lightgreen'});
                }
            }
        });
    });
});
//Limpa os campos do formulário dentro da janela modal, para que seja possível editar e adicionar dados
function limparForm(){
    $('#modalAddEdit .modal-title').text('Adicionar novo registro');
    $("#checkbox-gerar-user").css("display","block");
    $('form#addedit-tecnico').each (function(){this.reset();});
}