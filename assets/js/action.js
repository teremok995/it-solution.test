$('.alert').hide();
$('#btn-generate').click(function () {
    var link = $('#link_to').val();
    if (link == "") {
        $('.alert').show();
        return false;
    }
    
    if($("#defaultCheck1").prop("checked") == true){
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: 'link_to=' + link,
            success: function (res) {
                result = JSON.parse(res);
                if(!$('#randlink').length) $('#result-group').append('<label for="exampleInputEmail1">Ссылка:</label><input class="form-control text-center" type="text" disabled id="randlink" value="">');
                if(!$('#md5link').length) $('#result-group').append('<label for="exampleInputEmail1">Хеш ссылки MD5:</label><input class="form-control text-center" type="text" disabled id="md5link" value="">');
                $('#md5link').val(result.data.md5link);
                $('#randlink').val(result.data.randlink);
            }
        });
    return false;
    }
    else{
        
    }
    

    });