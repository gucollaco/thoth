// var image = document.querySelector('.image');
// var highlighter = new ImageMapHighlighter(image);

var image = $('.image')[0];

var highlighter = new ImageMapHighlighter(image,{
    fill: true,
    fillColor: '4286f4',
    fillOpacity: 1,
    stroke: false,
    strokeColor: 'ffffff',
    strokeOpacity: 0,
    strokeWidth: 0,
    alwaysOn: false
});


highlighter.init();

$('.tabular.menu .item').tab();