<? header("HTTP/1.0 404 Not Found");
require_once(__DIR__.'/_header.php');?>
    <div class="container">
        <header>
            <h1><?= $Lang['welcome404']; ?></h1>
        </header>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div>
                    <a href="/"><?= $Lang['home']?></a>
                </div>
            </div>
            <div class="col-sm-4">
                <? require_once(__DIR__.'/_aside.php');?>
            </div>
        </div>
    </div>
<? require_once(__DIR__.'/_footer.php');?>