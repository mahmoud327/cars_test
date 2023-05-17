    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Company Name</th>
                        <th>Price</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th colspan="3" style="text-alight:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                     foreach($listings as $list){ ?>
                    <tr>
                        <td><?php echo $i;  ?></td>
                        <td><?php echo $list['title']; ?></td>
                        <td><?php echo $list['companyName'] ?></td>
                        <td><?php echo $list['price'] ?></td>
                        <td><?php $list['model']; ?></td>
                        <td><?php echo $list['year'] ?></td>
                        <td><span
                                class="badge bg-label-<?php echo ($list['isActive']==0)?"warning":"success"; ?>"><?php echo ($list['isActive']==0)?"Awaitong Approvel":"Active"; ?></span>
                        </td>
                        <td>

                            <button type="button" onclick="confirmStatus(this)"
                                id="status<?php echo  $list['listingId']; ?>" data-column="listingId"
                                data-table="mstlisting" data-status="<?php echo  $list['isActive']; ?>"
                                data-update-path="admin/User/updateStatus" data-update="<?php echo  $list['listingId']; ?>"
                                title="Change  Status" class="btn btn-icon btn-label-linkedin col-4">
                                <i class="tf-icons ti ti-brand-linkedin"></i>
                            </button>
                        </td>
                
                        <td>
                            <a href="<?php echo base_url("admin//Company/carDetail/".$this->encrypt->encode($list['listingId'])) ?>" style="margin-left:2px"
                                class="btn btn-icon btn-label-success col-4">
                                <i class="tf-icons ti ti-eye"></i>
                            </a>
                        </td>
                        <td>
                            <button type="button" onclick="confirmDelete(this)" id="<?php echo  $list['listingId']; ?>"
                                data-column="listingId" data-delete-path="Delete/deleteListing"
                                data-delete="<?php echo  $list['listingId']; ?>" style="margin-left:2px"
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
    <!-- Modal to add new record -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                <div class="col-sm-12">
                    <label class="form-label" for="basicFullname">Full Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                        <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname"
                            placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2" />
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="basicPost">Post</label>
                    <div class="input-group input-group-merge">
                        <span id="basicPost2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                        <input type="text" id="basicPost" name="basicPost" class="form-control dt-post"
                            placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2" />
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="basicEmail">Email</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ti ti-mail"></i></span>
                        <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email"
                            placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="basicDate">Joining Date</label>
                    <div class="input-group input-group-merge">
                        <span id="basicDate2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                        <input type="text" class="form-control dt-date" id="basicDate" name="basicDate"
                            aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="basicSalary">Salary</label>
                    <div class="input-group input-group-merge">
                        <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                        <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary"
                            placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <script>
$(function() {
    $(".datatables").DataTable({

    })
});
    </script>