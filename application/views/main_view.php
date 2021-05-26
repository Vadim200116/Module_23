<main>
    <?php for ($i = 0; $i < count($data); $i++) { ?>
        <img src="/../Module_23/uploads/<?php echo $data[$i] ?>" alt="" />
        <?php if (($i + 1) % 4 == 0) { ?><br /><?php } ?>
    <?php } ?>
</main>

<?php if (isset($data)) : ?>
    <div class="container pt-4">
        <h1 class="mb-4">Загрузка файлов</h1>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (!empty($_FILES) && empty($errors)) : ?>
            <div class="alert alert-success">Файлы успешно загружены</div>
        <?php endif; ?>

        <form action="<?php echo URL; ?>" method="POST" enctype="multipart/form-data">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple required>
                <label class="custom-file-label" for="customFile" data-browse="Выбрать">Выберите файлы</label>
                <small class="form-text text-muted">
                    Максимальный размер файла: <?php echo UPLOAD_MAX_SIZE / 1000000; ?>Мб.
                    Допустимые форматы: <?php echo implode(', ', ALLOWED_TYPES) ?>.
                </small>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Загрузить</button>
            <a href="<?php echo URL; ?>" class="btn btn-secondary ml-3">Сброс</a>
        </form>
    </div>
<?php endif; ?>