<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {block 'title'} Генератор сокращенных ссылок ShortLink {/block}
    </title>
    {block 'css'}
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css"> {/block}
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto text-center">
                {block 'content'} {if $longtitle != ''}
                <h3>{$longtitle}</h3>
                {elseif $pagetitle != ''}
                <h3>{$pagetitle}</h3>
                {/if}
                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                  <strong>Ввод пустой строки!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="post">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Введите адрес сайта для сокрощения:</label>
                        <input type="url" name="link_to" class="form-control" id="link_to" placeholder="https://example.com" required autocomplete="off">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Работать через Ajax
                        </label>
                    </div>
                    <br>
                    <button id="btn-generate" type="submit" class="btn btn-primary">СОКРАТИ́ТЬ</button>
                    <div class="form-group" id="result-group">
                        {if $randlink != ''}
                        <label for="exampleInputEmail1">Ссылка:</label>
                        <input class="form-control text-center" type="text" disabled id="randlink" value="{$randlink}"> {/if} {if $md5link != ''}
                        <label for="exampleInputEmail1">Хеш ссылки MD5:</label>
                        <input class="form-control text-center" type="text" disabled id="md5link" value="{$md5link}"> {/if}
                    </div>
                </form>


                <div class="content">
                    {$content}
                </div>
                {/block}
            </div>
        </div>
    </div>
</body>
<footer>
    {block 'js'}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/action.js"></script>
    {/block}
</footer>

</html>
