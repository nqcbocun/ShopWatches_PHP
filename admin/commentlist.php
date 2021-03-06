<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php include '../classes/customer.php'; ?>
<?php include_once '../helpers/format.php'; ?>
<?php
$cs = new customer();
$fm = new Format();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Comment</h2>
        <div class="block">
            <?php
            if (isset($delcomment)) {
                echo $delcomment;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User's Comment</th>
                        <th>Comment For Product</th>
                        <th>Details Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cmlist = $cs->show_comment();
                    if ($cmlist) {
                        $i = 0;
                        while ($result = $cmlist->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['tenbinhluan'] ?></td>
                        <td><?php echo $result['product_id'] ?></td>
                        <td><?php echo $result['binhluan'] ?></td>

                        <td><a href="?binhluanid=<?php echo $result['binhluan_id'] ?>">Delete</a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php'; ?>