<form method="post">

    <table class="table">
        <tr>
            <th>Module</th>
            <th>Create</th>
            <th>Update</th>
            <th>View</th>
            <th>Delete</th>
        </tr>

        <?php
        foreach ($operations as $text => $arr) {
            ?>
            <tr>
                <td>
                    <?php echo $objects[$text] ?>
                    <?php foreach ($arr as $item => $checked) { ?>
                    <td>
                        <?php
                        $name = $text . '.' . $item;
                        echo Html::checkBox("Operations[{$name}]", $checked, array('class' => 'checkbox'))
                        ?>
                    </td>
                <?php } ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>


    <input type="submit" class="btn btn-primary" value="Update Permission">
</form>

<script type="text/javascript">
    $('#selectAll').click(function () {
        $('.checkbox').prop('checked', this.checked);
    });

    $('.checkbox').change(function () {
        var check = ($('.checkbox').filter(":checked").length == $('.checkbox').length);
        $('#selectAll').prop("checked", check);
    });
</script>