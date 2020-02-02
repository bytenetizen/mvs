<? require_once(__DIR__.'/_header.php');?>
<div class="container">
<header>
    <h1><?= htmlspecialchars($Lang['welcome'],ENT_QUOTES, 'UTF-8'); ?></h1>
</header>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form id="registerForm" enctype="multipart/form-data" method="post" action="/register/ajax">
                <div class="form-group">
                    <label for="surName"><?= htmlspecialchars($Lang['surname'],ENT_QUOTES, 'UTF-8'); ?></label>
                    <input type="text" class="form-control" id="surName" name="surName" placeholder="<?= $Lang['surnameText']; ?>" value="" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="name"><?= $Lang['name']; ?></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="<?= $Lang['nameText']; ?>" value="" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="email"><?= $Lang['email']; ?></label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="<?= $Lang['emailText']; ?>" maxlength="50">
                    <small id="emailHelp" class="form-text text-muted"><?= $Lang['emailHelp']; ?></small>
                </div>
                <div class="form-group">
                    <label for="password"><?= $Lang['password']; ?></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="<?= $Lang['passwordText']; ?>" required minlength="6" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="repeatPassword"><?= $Lang['return_password']; ?></label>
                    <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="<?= $Lang['return_password']; ?>" required minlength="6" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="userAvatar"><?= $Lang['avatar']; ?></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="userAvatar" name="userAvatar" value="hj" required accept="image/x-png, image/gif, image/jpeg">
                    <label class="custom-file-label" id="custom-file-label" for="userAvatar"><?= $Lang['avatar']; ?>...</label>
                </div>
                </div>
                <button type="submit" class="btn btn-primary"><?= $Lang['register']; ?></button>
            </form>
        </div>
        <div class="col-sm-4">
            <? require_once(__DIR__.'/_aside.php');?>
        </div>
    </div>
</div>
<? require_once(__DIR__.'/_footer.php');?>