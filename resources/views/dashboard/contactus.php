    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                     foreach($contacts as $list){ ?>
                    <tr>
                        <td><?php echo $i;  ?></td>
                        <td><?php echo $list['firstName']." ".$list['lastName'] ?></td>
                        <td><?php echo $list['email'] ?></td>
                        <td><?php echo $list['phoneNumber'] ?></td>
                        <td><?php echo $list['message'] ?></td>
                  
                      
                      
                        <td>
                            <button type="button" onclick="confirmDelete(this)" id="<?php echo  $list['contactId']; ?>" data-column="contactId" data-delete-path="Delete/deleteContact" data-delete="<?php echo  $list['contactId']; ?>" style="margin-left:2px" class="btn btn-icon btn-label-danger col-4">
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