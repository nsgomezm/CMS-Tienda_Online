$('document').ready(function(){
    $('#btn-sidebar').click(function(e){
        $('#nav').slideUp()
        $('#sidebar').toggleClass('show')
        e.stopPropagation()
    })

    $('#sidebar').click(function(e){
        e.stopPropagation()
    })

    $('html').click(function(){
        $('#sidebar').removeClass('show')
        $('#nav').slideUp('slow')
    })

    $('.subitem').click( function(){

        $(this).next().slideToggle()
        $(this).parent().toggleClass('active')
    })

    $('#btn-nav').click(function(e){
        $('#sidebar').removeClass('show')
        $(this).next().slideToggle()
        e.stopPropagation()
    })
})