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
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;"><?= $Table_Title ?></h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <?php foreach ($Table_Header as $value): ?>
                                        <th scope="col"><?= $value ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($Table_Data == false): ?>
                                    <tr>
                                        <?php foreach ($Table_Header as $value): ?>
                                            <th scope="col">-</th>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php else: ?>
                                    <?php $i = 0; ?>
                                    <?php foreach ($Table_Data as $values): ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <?php foreach ($values as $value): ?>
                                                <td><?= $value ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
