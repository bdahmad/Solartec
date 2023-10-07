<?php
require_once("functions/function.php");
needLogged();
if ($_SESSION['role'] == 1) {
    get_header();
    get_sidebar();

    $select = "SELECT * FROM `topbar` ";
    $query = mysqli_query($con, $select);
    $data = mysqli_fetch_assoc($query);

    if (!empty($_POST)) {
        $address = $_POST['address'];
        $time = $_POST['time'];
        $contact = $_POST['contact'];
        $linkedin = $_POST['linkedin'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram = $_POST['instagram'];


        $update = "UPDATE `topbar` SET `address`='$address',`office_time`='$time',`contact_no`='$contact',`facebook`='$facebook',`twitter`='$twitter',`linkedin`='$linkedin',`instagram`='$instagram' WHERE 1";


        if (!empty($address)) {
            if (!empty($time)) {
                if (!empty($contact)) {
                    if (!empty($facebook)) {
                        if (!empty($twitter)) {
                            if (!empty($linkedin)) {
                                if (!empty($instagram)) {
                                    if (mysqli_query($con, $update)) {
                                        header("Location: index.php");
                                    } else {
                                        echo "Opps! update failed";
                                    }
                                } else {
                                    echo "enter instagram link.";
                                }
                            } else {
                                echo "enter linkedin link.";
                            }
                        } else {
                            echo "enter twitter link.";
                        }
                    } else {
                        echo "enter facebook link.";
                    }
                } else {
                    echo "enter contact no.";
                }
            } else {
                echo "enter office time.";
            }
        } else {
            echo "enter address.";
        }
    }
?>

    <div class="row">
        <div class="col-md-12 ">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 card_title_part">
                                <i class="fab fa-gg-circle"></i>Update Top Menu
                            </div>
                            <!-- <div class="col-md-4 card_button_part">
                                <a href="all-member.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Member</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Address<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" value="<?= $data['address']; ?>" name="address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Office Time:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="time" value="<?= $data['office_time']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Contact No:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="contact" value="<?= $data['contact_no']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Facebook<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" value="<?= $data['facebook']; ?>" id="" name="facebook">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Twitter<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" value="<?= $data['twitter']; ?>" id="" name="twitter">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">LinkedIn<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" value="<?= $data['linkedin']; ?>" id="" name="linkedin">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Instagram<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" value="<?= $data['instagram']; ?>" id="" name="instagram">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

<?php
    get_footer();
} else {
    header('Location: index.php');
}
?>