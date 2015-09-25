<table style="width:100%;" border="1">
    <thead>
    <tr>
        <th>Plugin</th>
        <th>Status</th>
        <th>URI</th>
        <th>Version</th>
        <th>Description</th>
        <th>Author</th>
        <th>Data</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($plugins as $k => $p): ?>
    <tr>
        <td><?php echo '<a href="/plugins/config/?plugin=' . $p->system_name . '">' . $p->name . '</a>'; ?></td>
        <td><?php echo ($p->status ? 'Enabled' : 'Disabled'); ?></td>
        <td><?php echo '<a href=' . $p->uri . '" target="_blank">' . $p->uri . '</a>'; ?></td>
        <td><?php echo $p->version; ?></td>
        <td><?php echo $p->description; ?></td>
        <td><?php echo '<a href=' . $p->author_uri . '" target="_blank">' . $p->author . '</a>'; ?></td>
        <td><pre><?php echo ($p->data ? print_r(unserialize($p->data), TRUE) : 'No Data'); ?></pre></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>