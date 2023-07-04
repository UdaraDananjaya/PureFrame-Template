<main id="main" class="main">
    <div class="pagetitle">
        <h1><?= $page ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item active"><?= $page ?></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $Form_Title ?></h5>
                        <!-- Vertical Form -->
                        <form class="row g-3" method="POST">
                            <?php foreach ($Form_Data as $value): ?>
                                <?php if ($value['type'] === 'hidden'): ?>
                                    <input type="<?= $value['type'] ?>" name="<?= $value['name'] ?>" class="form-control" id="<?= $value['name'] ?>" <?= $value['attribute'] ?> value="<?= $value['value'] ?>">
                                <?php elseif ($value['type'] === 'select'): ?>
                                    <div class="col-12">
                                        <label for="<?= $value['name'] ?>" class="form-label"><?= $value['label'] ?></label>
                                        <select id="<?= $value['name'] ?>" class="form-select" aria-label="Default select example" name="<?= $value['name'] ?>" <?= $value['attribute'] ?>>
                                            <option disabled selected>Select <?= $value['name'] ?></option>
                                            <?php foreach ($value['value'] as $option): ?>
                                                <?php foreach ($option as $key => $val): ?>
                                                    <option value="<?= $key ?>"> <?= $val ?> </option>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php else: ?>
                                    <div class="col-12">
                                        <label for="<?= $value['name'] ?>" class="form-label"><?= $value['label'] ?></label>
                                        <input type="<?= $value['type'] ?>" name="<?= $value['name'] ?>" class="form-control" id="<?= $value['name'] ?>" <?= $value['attribute'] ?> value="<?= $value['value'] ?>">
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
