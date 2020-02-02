<? require_once(__DIR__.'/_header.php');?>
<div class="container">
<header>
    <h1><?= $Lang['welcome']; ?></h1>
</header>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <? if(empty($_SESSION["user_login"])) : ?>
            <form id="loginForm" enctype="multipart/form-data" method="post" action="/login">
                <div class="form-group">
                    <label for="email"><?= $Lang['email']; ?></label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="<?= $Lang['emailText']; ?>" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="password"><?= $Lang['password']; ?></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="<?= $Lang['passwordText']; ?>" required minlength="6" maxlength="50">
                </div>
                <button type="submit" class="btn btn-primary"><?= $Lang['login']; ?></button>
            </form>
    <? else : ?>
            <div>
                <h3><?= $user['name']?></h3>
                <div>
                    <img src="/upload/user/<?= $user['avatar']?>">
                </div>
            </div>
    <? endif; ?>
        </div>
        <div class="col-sm-4">
            <? require_once(__DIR__.'/_aside.php');?>
        </div>
    </div>
</div>
<? require_once(__DIR__.'/_footer.php');?>