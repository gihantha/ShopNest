<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/common/head") ?>
    <?php $this->load->view("admin/common/js") ?>

</head>

<body>

    <div class="container-fluid mb-5 mt-5">
        <div class="row">

            <!-- Sidebar -->

            <?php $this->load->view("inventory/common/sidebar") ?>


            <!-- Navbar End -->

            <!-- Main Content -->
            <div class="col-lg-9 m-1">
                <div class="card">
                    <h1>Categories</h1>
                    
                    <button type="button" class="btn btn-primary w-20 ml-2  border-radius:3rem">Add Category</button>
                    <button type="button" class="btn btn-primary">Primary</button>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Number of Products</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 2</td>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 1</td>
                            </tr>
                            <tr>
                                <td>Row 2 Data 1</td>
                                <td>Row 2 Data 2</td>
                                <td>Row 1 Data 2</td>
                                <td>Row 1 Data 2</td>
                                <td>Row 1 Data 2</td>
                                <td>Row 1 Data 2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php $this->load->view("admin/common/footer") ?>
    <?php $this->load->view("admin/common/js") ?>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>