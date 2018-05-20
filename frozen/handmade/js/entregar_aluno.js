// var image = document.querySelector('.image');
// var highlighter = new ImageMapHighlighter(image);

var image = $('.image')[0];

$("#remove-highlight").prop('disabled', true);

var highlighter = new ImageMapHighlighter(image,{
    fill: true,
    fillColor: 'ffea00',
    fillOpacity: 1,
    stroke: false,
    strokeColor: 'ffffff',
    strokeOpacity: 0,
    strokeWidth: 0,
    alwaysOn: false
});


highlighter.init();

$('.tabular.menu .item').tab();

$('span.comment-link').click(function(){
    _this = this;
    if($('#highlights hightlight').length >= 1){
        var matematica_basica = $('#highlights hightlight').length;
        var data_number = parseInt($(this).text().replace("<<", "0").replace("Highlight ", "").replace(">>", ""));
        if(data_number == matematica_basica){
            data_number = -1;
            $(_this).removeClass('linked');
            $(_this).text("<<>>");
            return false;
        }

        $('#highlights hightlight').each(function(index){
            if($(this).attr('number') > data_number){
                $(_this).addClass('linked');
                $(_this).text("<<Highlight " + $(this).attr("number") + ">>");

                return false;
            }
        });
    }
});