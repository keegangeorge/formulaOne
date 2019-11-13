<?php require_once '../private/initialize.php'; 

require_login();

if (is_post_request()) {
	$account['first_name'] = $_POST['first_name'] ?? '';
	$account['last_name'] = $_POST['last_name'] ?? '';
	$account['email'] = $_POST['email'] ?? '';

	$result = update_user_information($account, $_SESSION['username']);

} else {
	// display the blank form
	$account = [];
	$account['first_name'] = '';
	$account['last_name'] = '';
	$account['email'] = '';
}

$account_info = find_account_info($_SESSION['username']);
$full_name = $account_info['first_name'] . ' ' . $account_info['last_name'];
$first_name = $account_info['first_name'];
$last_name = $account_info['last_name'];
$email = $account_info['email'];
$username = $account_info['username'];

$user_comments_set = find_comments_by_username($username);
$comment_count = find_comment_count($username);
$latest_comment = find_latest_comment($username);

?>

<?php $page_title = 'My Account'; ?>
<?php include SHARED_PATH . '/public_header.php'; ?>

<!-- Account Header START -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-3 bg-primary position-relative">
    <div class="container text-white tofront" data-aos="fade">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-12">
                <h1 class="display-3">My Account</h1>
            </div>
        </div>
    </div>
</div>

<!-- Account Header END -->
<div class="container mt-5">

    <div class="row">
        <div class="col-sm-10 mb-4">
            <h1 class="text-secondary">
                <i class="fas fa-user-circle"></i>
                <?php echo $username; ?>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group shadow-sm">
                <li class="list-group-item bg-primary text-white"><i class="fas fa-user fa-1x"></i> Profile</li>

                <li class="list-group-item"><strong class="font-weight-bold">Name</strong> <?php echo $full_name; ?>
                </li>
                <li class="list-group-item"><strong class="font-weight-bold">Email</strong> <?php echo $email; ?>
                </li>
            </ul>

            <ul class="list-group mt-4 shadow-sm">
                <li class="list-group-item bg-primary text-white"><i class="fa fa-chart-line fa-1x"></i> Activity</li>

                <li class="list-group-item"><strong class="font-weight-bold">Comments</strong> <?php echo $comment_count['COUNT(*)']; ?></li>
                <li class="list-group-item"><strong class="font-weight-bold">Last Post</strong> <?php echo date_format(date_create($latest_comment['MAX(date)']), 'g:ia M/j/y'); ?></li>
            </ul>
        </div>

        <!--/col-3-->
        <div class="col-sm-9" data-aos="fade">

            <ul class="nav" id="myTab">
                <li class="pl-0 pr-1 nav-item nav-link active"><a class="btn btn-sm btn-outline-primary active" href="#settings" data-toggle="tab">Settings</a></li>
                <li class="pl-0 pr-1 nav-item nav-link"><a class="btn btn-sm btn-outline-primary" href="#comments" data-toggle="tab">Comments</a></li>
            </ul>

            <div class="tab-content mb-5" data-aos="fade">
                <div class="tab-pane bg-light rounded p-4 active" id="settings">
                    <form class="form" action="<?php echo url_for('/account.php'); ?>" method="post" id="accountUpdateForm">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4>
                                </label>
                                <input value="<?php echo h($account['first_name']); ?>" type="text" class="form-control" name="first_name" id="first_name" placeholder="<?php echo $first_name; ?>" title="enter your first name if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4>
                                </label>
                                <input value="<?php echo h($account['last_name']); ?>" type="text" class="form-control" name="last_name" id="last_name" placeholder="<?php echo $last_name; ?>" title="enter your last name if any.">
                            </div>
                        </div>
                        
                        <div class="form-group">
                           <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" value="<?php echo h($account['email']); ?>" id="email" placeholder="<?php echo $email; ?>" title="enter your email.">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--/tab-pane-->
                <div class="tab-pane bg-light rounded p-4" id="comments" data-aos="fade"> 


                    <ul class="list-group">
                        <?php while ($user_comment = mysqli_fetch_assoc($user_comments_set)) { 
                            $race_set = find_race_by_raceId($user_comment['raceId']);
                        ?>
                        <li class="list-group-item">
                            <h5 class="text-secondary font-weight-strong"><?php echo $race_set['name'] . ' (' . $race_set['year'] . ')'; ?></h5>
                            <h6><strong>Comment: </strong><?php echo $user_comment['message']; ?></h6>
                            <p class="mb-0"><strong class="font-weight-bold">Date: </strong><?php echo date_format(date_create($user_comment['date']), "M/d/Y h:i:sa") ?></p>
                        </li>
                        <?php } ?>
                    </ul>

                </div>
                <!--/tab-pane-->

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->





<?php mysqli_free_result($user_comments_set); ?>
<?php include SHARED_PATH . '/public_footer.php'; ?>