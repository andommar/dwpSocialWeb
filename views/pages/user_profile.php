<?php 
$u = new UserController();
$userData = $u->getUserInfo();
?>


<div class="row">
    <div class="col col-lg-10 col-xs-12 d-flex justify-content-center">
        <section id="user_profile_section">
            <div class="profile-wrapper">
                <div class="row py-4 mt-2">
                    <div class="col-lg-12 d-flex flex-column justify-content-center px-4">
                        <div class="profile-title d-flex justify-content-center">
                            <h2>User profile</h2>
                        </div>    
                        <div class="profile-avatar d-flex justify-content-center">
                            <img src="views/web/img/avatars/<?php echo $userData['avatar'] ?>" alt="avatar" id="user_profile" class="rounded-circle"/>
                        </div>
                        <div class="user-details d-flex flex-column align-items-center">
                            <span id="username-detail"><?php echo $userData['username'] ?></span>
                            <span id="username-detail"><?php echo $userData['email'] ?></span>
                            <!-- <span id="user-rank"><?php echo $userData['rank'] ?></span> -->
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" id="new-avatar-form">
                          <div class="form-group  d-flex flex-column align-items-center">
                              <div class="custom-file">
                                  <input type="file" name="new-avatar-upload" class="custom-file-input" id="new-avatar-upload">
                                  <span class="msg error-message my-2" id="avatar-error">
                                  <button class="btn btn-primary" type="button" onclick="uploadUserAvatar()">
                                      <i class="fa fa-fw fa-camera"></i>
                                      <span>Upload avatar</span>
                                  </button>
                              </div>
                              <div id="avatar-msg"></div>
                          </div>
                        </form>
                        <form action="" method="post" id="profile-form">
                          <hr>
                          <div class="profile-settings">
                              <h3>Profile Settings</h3>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" id="email-profile" placeholder="<?php echo $userData['email'] ?>">
                                <span class="msg error-message my-2" id="email-error">
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>New Password</label>
                                <input class="form-control" type="password" name="password1" id="password1-profile" placeholder="••••••">
                                <span class="msg error-message my-2" id="password1-error">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" name="password2" id="password2-profile" placeholder="••••••">
                                <span class="msg error-message my-2" id="password2-error">
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Current Password</label>
                                <input class="form-control" type="password" name="password" id="password-profile" placeholder="••••••">
                                <span class="msg error-message my-2" id="password-error">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col d-flex justify-content-end pt-4 pb-2">
                                  <button class="btn btn-primary" type="button" onclick="submitUserSettingsForm()">Save Changes</button>
                              </div>
                              <div id="success-msg"></div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>