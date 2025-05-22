<?php
include("session.php");
include('common/header.php');
include('include/db_config.php');
?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table" id="categoriesTable">
                        <thead>
                            <tr>
                                <th class="text-center">Images</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Sample Row -->
                            <tr>
                                <td class="text-center align-middle h-[100px]">
                                    <img src="path/to/image.jpg" style="width: 70px; height: 70px;">
                                </td>
                                <td style="vertical-align: middle;">1</td>
                                <td style="vertical-align: middle;">Category Name</td>
                                <td style="vertical-align: middle;">
                                    <span class="badge bg-success">Active</span>
                                    <!-- Or: <span class="badge bg-danger">Inactive</span> -->
                                </td>
                                <td style="vertical-align: middle;" class="text-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" checked>
                                    </div>
                                    <a href="#" class="badge bg-warning text-dark">Edit</a>
                                    <button class="badge bg-danger text-dark">Delete</button>
                                </td>
                            </tr>

                            <!-- Additional rows can be added here -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>