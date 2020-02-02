<!DOCTYPE html>
<html lang="<?= $_SESSION['user_lang'] ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?= $Lang['title']?></title>
    <base href="http://mvc" />
    <meta name="title" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="<? echo $GLOBALS['PHPSESSID'] ?>">
    <link rel="icon" href="/favicon.png">
    <link href="/assets/css/styles.css" rel="stylesheet"></head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script>
    const requiredText = '<?php echo $Lang['required_text'] ?>';
    const minlengthText = '<?php echo $Lang['minlength_text'] ?>';
    const maxlengthText = '<?php echo $Lang['maxlength_text'] ?>';
    const requiredTextEmail = '<?php echo $Lang['required_text_email'] ?>';
    const requiredCheckEmail = '<?php echo $Lang['required_check_email'] ?>';
    const goodString = '<?php echo $Lang['good_string'] ?>';
    const equalToText = '<?php echo $Lang['equal_to_text'] ?>';
    const successText = 'OK';
    const successRegister = '<?php echo $Lang['success_register'] ?>';
</script>
<body>
