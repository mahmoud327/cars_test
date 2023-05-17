<div class="col-md">
    <div class="card">
        <h5 class="card-header">Add listing Feature</h5>
        <div class="card-body">
            <?php
             if ($this->session->userdata("addFeatureMsg")!="") { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <?php echo $this->session->userdata("addFeatureMsg"); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php  }elseif($this->session->userdata("addFeatureErrorMsg")!=""){
                ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo $this->session->userdata("addFeatureErrorMsg"); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php  }
            ?>
            <form class="needs-validation" method="POST" novalidate>
                <div class="mb-3">
                    <label class="form-label" for="bs-validation-name">Feature Name</label>
                    <input type="text" class="form-control"
                        value="<?php echo isset($feature['featureName'])?$feature['featureName']:""; ?>" name="featureName"
                        id="bs-validation-name" placeholder="any car feature" required />
                    <div class="valid-feedback"></div>
                    <span><?php echo form_error("featureName"); ?></span>
                </div>
             
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>