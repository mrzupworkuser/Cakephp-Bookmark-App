<div class="bookmarks index content">

    <h3><?= __('Top Domains Bookmarks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <th>Total</th>
                <th>Domain</th>
            </thead>
            <tbody>
                <?php foreach ($top_bookmarks as $bookmark) : ?>
                    <tr>
                        <td>
                           <span class="button">
                                <?= h($bookmark->total) ?> 
                           </span> 
                        </td>
                        <td>
                            <?= h($bookmark->url) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>