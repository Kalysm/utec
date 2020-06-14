$(function(){
    var str = '#len';
    $(document).ready(function(){
        var i, stop;
        i = 1;
        stop = 4;
        setInterval(function(){
            if (i > stop){
                return;
            }
            $('#len'+(i++)).toggleClass('bounce');
        }, 500)
    });
});