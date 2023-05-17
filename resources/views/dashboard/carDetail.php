<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Profile</h4>
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-3 pt-1 mt-4"
                                src="<?php echo ($profile['images'][0]['image']!=null)?base_url($profile['images'][0]['image']):base_url("app-assets/images/avatars/avator.jpg");?>"
                                height="100" width="100" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4 class="mb-2"><?php echo $profile['title']?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap pb-4 border-bottom">

                    </div>
                    <p class="mt-4 small text-uppercase text-muted">Details</p>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <span class="fw-semibold me-1">Model:</span>
                                <span><?php echo $profile['model']." ".$profile["year"] ?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Condition:</span>
                                <span><?php echo $profile['condition']?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Status:</span>
                                <span
                                    class="badge bg-label-<?php echo ($profile['isActive']=='1')?"success":"warning" ?>"><?php echo ($profile['isActive']=='1')?"Active":"InActive"; ?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Type:</span>
                                <span><?php echo $profile['type']?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Make:</span>
                                <span><?php echo $profile['make']?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Price:</span>
                                <span><?php echo $profile['price']."$"?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Drive Type:</span>
                                <span><?php echo $profile['driveType']?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">transmission:</span>
                                <span><?php echo $profile['transmission']?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Fuel Type:</span>
                                <span><?php echo $profile['fuelType']?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Mileage:</span>
                                <span><?php echo $profile['mileage']?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Engine Size:</span>
                                <span><?php echo $profile['engineSize']?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Cylinders:</span>
                                <span><?php echo $profile['cylinders']?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Color:</span>
                                <span><?php echo $profile['color']?></span>
                            </li>

                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Doors:</span>
                                <span><?php echo $profile['doors']?></span>
                            </li>

                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">VIN:</span>
                                <span><?php echo $profile['VIN'] ?></span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Languages:</span>
                                <span>English</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-semibold me-1">Address:</span>
                                <span><?php echo $profile['address'] ?></span>
                            </li>

                        </ul>
                        <div class="d-flex justify-content-center">
                            <!-- <a href="<?php echo base_url("admin/User/editCompany/".$this->encrypt->encode($profile['userId']))  ?>"
                                class="btn btn-primary me-3" data-bs-target="#editUser" data-bs-toggle="modal">Edit</a> -->
                            <a href="javascript:;" onclick="confirmDelete(this)" id="<?php echo  $profile['listingId']; ?>"
                                data-column="listingId" data-delete-path="Delete/deleteListing"
                                data-delete="<?php echo  $profile['listingId']; ?>"
                                class="btn btn-label-danger suspend-user">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>
        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                            aria-selected="true">
                            <i class="tf-icons ti ti-details ti-xs me-1"></i> Description
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile"
                            aria-selected="false">
                            <i class="tf-icons ti ti-shopping-cart ti-xs me-1"></i> Gallery
                        </button>
                    </li>
                    <!-- <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-messages"
                          aria-controls="navs-pills-justified-messages"
                          aria-selected="false"
                        >
                          <i class="tf-icons ti ti-star ti-xs me-1"></i> Reviews
                        </button>
                      </li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                        <div class="card mb-3">
                            <p>
                                <?php echo $profile['description']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                        <div class="row">
                            <?php foreach($profile['images'] as $images){ ?>
                            <div class="col-6">
                              <img src="<?php echo base_url($images['image']); ?>" style="width:100%" alt="">
                            </div>
                            <?php } ?>
                       

                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                        <p>
                          Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                          cupcake gummi bears cake chocolate.
                        </p>
                        <p class="mb-0">
                          Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
                          roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                          jelly-o tart brownie jelly.
                        </p>
                      </div> -->
                </div>
            </div>
            <!-- /Project table -->

        </div>
        <!--/ User Content -->
    </div>

    <!-- /Modal -->
</div>