<?php view('partials/head.view.php'); ?>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Map</th>
                            <th scope="col" class="px-6 py-4">Kills/Deaths</th>
                            <th scope="col" class="px-6 py-4">MVP</th>
                            <th scope="col" class="px-6 py-4">Rounds (w/l)</th>
                            <th scope="col" class="px-6 py-4">CT (w/l)</th>
                            <th scope="col" class="px-6 py-4">T (w/l)</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php /** @var \App\Stats $tableData */ ?>
                        <?php foreach ($tableData as $data) : ?>

                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium"><?= $data->id; ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?= $data->map; ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?= $data->kills; ?> / <?= $data->deaths; ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?= $data->mvp; ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?= $data->rounds_won; ?> / <?= $data->rounds_lost; ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?= $data->ct_won; ?> / <?= $data->ct_lost; ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?= $data->t_won; ?> / <?= $data->t_lost; ?></td>
                        </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php view('partials/footer.view.php'); ?>