$(function() {
    $('#sides-number-form').click(function(event){
        if((event.target.className).indexOf('drinkcard-cc') >= 0) {
            value = event.target.previousElementSibling.value;
            $(this).children().removeClass('selected');
            event.target.classList.add('selected');
            $('#sides-number').val(value);
        }
    });
    $('#parallel-sides-number-form').click(function(event){
        if((event.target.className).indexOf('drinkcard-cc') >= 0) {
            value = event.target.previousElementSibling.value;
            $(this).children().removeClass('selected');
            event.target.classList.add('selected');
            $('#parallel-sides-number').val(value);
        }
    });
    $('#right-angles-number-form').click(function(event){
        if((event.target.className).indexOf('drinkcard-cc') >= 0) {
            value = event.target.previousElementSibling.value;
            $(this).children().removeClass('selected');
            event.target.classList.add('selected');
            $('#right-angles-number').val(value);
        }
    });
    $('#identical-sides-number-form').click(function(event){
        if((event.target.className).indexOf('drinkcard-cc') >= 0) {
            value = event.target.previousElementSibling.value;
            $(this).children().removeClass('selected');
            event.target.classList.add('selected');
            $('#identical-sides-number').val(value);
        }
    });

    $('#detect')
        .mouseenter(function() {
       $(this).fadeTo(100, 0.7);
       $(this).attr('id', 'detect-hover');
    })
        .mouseleave(function() {
       $(this).fadeTo(100, 1);
       $(this).attr('id', 'detect');
    });

    $('#detect').click(function(event) {
        url             = './conclusion.php';
        sides           = $('#sides-number').val();
        parallelSides   = $('#parallel-sides-number').val();
        rightAngles     = $('#right-angles-number').val();
        identicalSides  = $('#identical-sides-number').val();
        facts = {
            'sides-number': sides,
            'parallel-sides-number': parallelSides,
            'right-angles-number': rightAngles,
            'identical-sides-number': identicalSides
        }

        $("#text-result").html('<span class="text-secondary">Loading...</span>');
        $("#img-result").attr('src', 'img/loading.gif');

        $.ajax({
            url: url,
            data: facts,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $("#text-result").html(data['text']);
                $("#img-result").attr('src', data['img']);
                console.log(data['text']);
                console.log(data['img']);
            }
        });
    });
});