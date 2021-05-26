<form method="POST" action="login/check">
    <div class="form-group">
        <label for="name">Имя</label>
        <input required type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Введите имя">
        <div class="form-control-feedback"></div>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input required type="password" class="form-control" id="password" name="password" placeholder="Пароль">
        <div class="form-control-feedback"></div>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>


    <?php if (!empty($data)) :    ?>

        <div class="alert alert-danger">
            <?php echo $data; ?>
        </div>
    <?php endif; ?>
    </div>
</form>