<form id="registration" method="POST" action="register/check">
    <div class="form-group">
        <label for="email">Email</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Введите email">
        <div class="form-control-feedback"></div>
    </div>
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
    <div class="form-group">
        <label for="repeat-password">Повторение пароля</label>
        <input required type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="Повторите пароль">
        <div class="form-control-feedback"></div>
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>
<?php if (!empty($data)) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($data as $err) : ?>
                <li><?php echo $err; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>