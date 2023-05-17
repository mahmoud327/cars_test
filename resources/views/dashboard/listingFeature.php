    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-users table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Feature Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                     foreach($features as $list){ ?>
                    <tr>
                        <td><?php echo $i;  ?></td>
                   
                        <td><?php echo $list['featureName'] ?></td>
                
                        <td>
                           <a href="<?php echo base_url("admin/General/addEditFeature/".$this->encrypt->encode($list['featureId'])) ?>" style="margin-left:2px"
                                class="btn btn-icon btn-label-warning col-4">
                                <i class="tf-icons ti ti-edit"></i>
                     </a>
                            <button type="button" onclick="confirmDelete(this)" id="<?php echo  $list['featureId']; ?>"
                                data-column="userId" data-delete-path="Delete/deleteContact"
                                data-delete="<?php echo  $list['featureId']; ?>" style="margin-left:2px"
                                class="btn btn-icon btn-label-danger col-4">
                                <i class="tf-icons ti ti-trash"></i>
                            </button>


                        </td>

                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
$(function() {
    $(".datatables-basic").DataTable({

    })
});
    </script>