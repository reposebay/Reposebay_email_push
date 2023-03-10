<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function() {
            if ($('.gdpr_fulltime').is(':checked')) {

                $('.fulltime').show();
            } else {

                $('.fulltime').hide();
            }

            $('#gdpr_cookie').on('change', function() {
                if ($('.gdpr_fulltime').is(':checked')) {

                    $('.fulltime').show();
                } else {

                    $('.fulltime').hide();
                }
            });
        });

        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })

        $('.themes-color-change').on('click', function() {
            var color_val = $(this).data('value');
            $('.theme-color').prop('checked', false);
            $('.themes-color-change').removeClass('active_color');
            $(this).addClass('active_color');
            $(`input[value=${color_val}]`).prop('checked', true);

        });


    </script>
    <script>
        document.getElementById('logo').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('image').src = src
        }
    </script>
     <script>
        document.getElementById('logo_light').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('image1').src = src
        }
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Settings')); ?></li>
<?php $__env->stopSection(); ?>



<?php
$logo = asset(Storage::url('uploads/logo/'));
$lang = \App\Models\Utility::getValByName('default_language');
$color = isset($settings['theme_color']) ? $settings['theme_color'] : 'theme-4';
// $is_sidebar_transperent = isset($settings['is_sidebar_transperent']) ? $settings['is_sidebar_transperent'] : '';
// $dark_mode = isset($settings['dark_mode']) ? $settings['dark_mode'] : '';
$setting = App\Models\Utility::settings();

$SITE_RTL = $settings['SITE_RTL'];
if ($SITE_RTL == '') {
    $SITE_RTL == 'off';
}
?>





<?php $__env->startSection('content'); ?>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-3">
                <div class="card sticky-top">
                    <div class="list-group list-group-flush" id="useradd-sidenav">

                        <a href="#site-setting" id="site-setting-tab"
                            class="list-group-item list-group-item-action border-0"><?php echo e(__('Site Setting')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                        <a href="#email-setting" id="email-setting-tab"
                            class="list-group-item list-group-item-action border-0"><?php echo e(__('Email Setting')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                        <a href="#payment-setting" id="payment-setting-tab"
                            class="list-group-item list-group-item-action border-0"><?php echo e(__('Payment Setting')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                        <a href="#pusher-setting" id="pusher-setting-tab"
                            class="list-group-item list-group-item-action border-0"><?php echo e(__('Pusher Setting')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                        <a href="#recaptcha-print-setting" id="recaptcha-print-tab"
                            class="list-group-item list-group-item-action border-0"><?php echo e(__('ReCaptcha Setting')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="" id="site-setting">
                    <?php echo e(Form::model($settings, ['url' => 'settings', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Site Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5><?php echo e(__('Logo dark')); ?></h5>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class=" setting-card">
                                                        <div class="logo-content mt-4 setting-logo">
                                                            <img id="image" src="<?php echo e(asset(Storage::url('uploads/logo/logo-dark.png'))); ?>"
                                                                class="logo logo-sm"
                                                                style="filter: drop-shadow(2px 3px 7px #011c4b);">
                                                        </div>
                                                        <div class="choose-files mt-5">
                                                            <label for="logo">
                                                                <div class=" bg-primary logo_update"> <i
                                                                        class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                </div>
                                                                <input type="file" class="form-control file" name="logo"
                                                                    id="logo" data-filename="logo_update"
                                                                    accept=".jpeg,.jpg,.png" accept=".jpeg,.jpg,.png">
                                                            </label>
                                                        </div>


                                                        <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="row">
                                                                <span class="invalid-logo" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5><?php echo e(__('Logo Light')); ?></h5>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class=" setting-card">
                                                        <div class="logo-content mt-4  setting-logo">
                                                            <img id="image1" src="<?php echo e(asset(Storage::url('uploads/logo/logo-light.png'))); ?>"
                                                                class="logo logo-sm img_setting"
                                                                style="filter: drop-shadow(2px 3px 7px #011c4b);">
                                                        </div>

                                                        <div class="choose-files mt-5">
                                                            <label for="logo_light">
                                                                <div class=" bg-primary logo_light_update"> <i
                                                                        class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                </div>
                                                                <input type="file" class="form-control file"
                                                                    name="logo_light" id="logo_light"
                                                                    data-filename="logo_light_update">
                                                            </label>
                                                        </div>

                                                        <?php $__errorArgs = ['logo_light'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="row">
                                                                <span class="invalid-logo_light" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5><?php echo e(__('Favicon')); ?></h5>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class=" setting-card">
                                                        <div class="logo-content mt-4 setting-logo ">
                                                            <img src="<?php echo e(asset(Storage::url('uploads/logo/favicon.png'))); ?>"
                                                                width="50px" class="logo logo-sm img_setting">
                                                        </div>
                                                        <div class="choose-files mt-5">
                                                                <label for="favicon_update">
                                                                    <div class=" bg-primary favicon_update"> <i
                                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                    </div>
                                                                    <input type="file" class="form-control file"
                                                                        name="favicon" id="favicon_update"
                                                                        data-filename="favicon_update">
                                                                </label>
                                                        </div>
                                                        <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="row">
                                                                <span class="invalid-favicon" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <?php echo e(Form::label('title_text', __('Title Text'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')])); ?>

                                            <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-title_text" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



                                        </div>
                                        <div class="form-group col-md-4">
                                            <?php echo e(Form::label('footer_text', __('Footer Text'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')])); ?>

                                            <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-footer_text" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <?php echo e(Form::label('default_language', __('Default Language'), ['class' => 'col-form-label'])); ?>

                                            <select name="default_language" id="default_language"
                                                class="form-control select2">
                                                <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($lang == $language): ?> selected <?php endif; ?>
                                                        value="<?php echo e($language); ?>"><?php echo e(Str::upper($language)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>
                                        <div class="row">
                                            <div class="col-3 ">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3">

                                                        <?php echo e(Form::label('display_landing_page', __('Landing Page Display'), ['class' => 'col-form-label'])); ?>


                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="display_landing_page" id="display_landing_page"
                                                                <?php echo e($settings['display_landing_page'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label mb-1"
                                                                for="display_landing_page"></label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 ">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3">
                                                        <?php echo e(Form::label('SITE_RTL', __('RTL'), ['class' => 'col-form-label'])); ?>

                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="SITE_RTL" id="SITE_RTL"
                                                                <?php echo e(Utility::getValByName('SITE_RTL') == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label mb-1" for="SITE_RTL"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3 ">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3">
                                                        <?php echo e(Form::label('disable_signup_button', __('Signup'), ['class' => 'col-form-label'])); ?>

                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="disable_signup_button" id="disable_signup_button"
                                                                <?php echo e($settings['disable_signup_button'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label mb-1"
                                                                for="disable_signup_button"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-3">
                                                <div class="custom-control custom-switch p-0">
                                                    <div class="form-group ml-2 mr-3">
                                                        <label class="col-form-label"
                                                            for="gdpr_cookie"><?php echo e(__('GDPR Cookie')); ?></label><br>
                                                        <input type="checkbox"
                                                            class="form-check-input gdpr_fulltime gdpr_type"
                                                            data-toggle="switchbutton" data-onstyle="primary"
                                                            name="gdpr_cookie" id="gdpr_cookie"
                                                            <?php echo e(isset($settings['gdpr_cookie']) && $settings['gdpr_cookie'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <?php echo e(Form::label('cookie_text', __('GDPR Cookie Text'), ['class' => 'fulltime form-label'])); ?>

                                            <?php echo Form::textarea('cookie_text', isset($settings['cookie_text']) && $settings['cookie_text'] ? $settings['cookie_text'] : '', ['class' => 'form-control fulltime', 'style' => 'display: hidden;resize: none;', 'rows' => '2']); ?>

                                        </div>

                                        <h5 class="mt-3 mb-3"><?php echo e(__("Theme Customizer")); ?></h5>
                                        <div class="col-12">
                                            <div class="pct-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="">
                                                            <i data-feather="credit-card"
                                                                class="me-2"></i><?php echo e(__('Primary color settings')); ?>

                                                        </h6>
                                                        <hr class="my-2" />

                                                        <div class="theme-color themes-color">
                                                            <a href="#!"
                                                                class="themes-color-change <?php echo e($color == 'theme-1' ? 'active_color' : ''); ?>"
                                                                data-value="theme-1"></a>
                                                            <input type="radio" class="theme_color d-none"
                                                                name="theme_color" value="theme-1"
                                                                <?php echo e($color == 'theme-1' ? 'checked' : ''); ?>>
                                                            <a href="#!"
                                                                class="themes-color-change <?php echo e($color == 'theme-2' ? 'active_color' : ''); ?>"
                                                                data-value="theme-2"></a>
                                                            <input type="radio" class="theme_color d-none"
                                                                name="theme_color" value="theme-2"
                                                                <?php echo e($color == 'theme-2' ? 'checked' : ''); ?>>
                                                            <a href="#!"
                                                                class="themes-color-change <?php echo e($color == 'theme-3' ? 'active_color' : ''); ?>"
                                                                data-value="theme-3"></a>
                                                            <input type="radio" class="theme_color d-none"
                                                                name="theme_color" value="theme-3"
                                                                <?php echo e($color == 'theme-3' ? 'checked' : ''); ?>>
                                                            <a href="#!"
                                                                class="themes-color-change <?php echo e($color == 'theme-4' ? 'active_color' : ''); ?>"
                                                                data-value="theme-4"></a>
                                                            <input type="radio" class="theme_color d-none"
                                                                name="theme_color" value="theme-4"
                                                                <?php echo e($color == 'theme-4' ? 'checked' : ''); ?>>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <h6 class=" ">
                                                            <i data-feather="layout"
                                                                class="me-2"></i><?php echo e(__('Sidebar settings')); ?>

                                                        </h6>
                                                        <hr class="my-2 " />
                                                        <div class="form-check form-switch ">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="cust_theme_bg" name="cust_theme_bg"
                                                                <?php if($settings['cust_theme_bg'] == 'on'): ?> checked <?php endif; ?> />

                                                            <label class="form-check-label f-w-600 pl-1"
                                                                for="cust_theme_bg"><?php echo e(__('Transparent layout')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6 class=" ">
                                                            <i data-feather="sun"
                                                                class=""></i><?php echo e(__('Layout settings')); ?>

                                                        </h6>
                                                        <hr class=" my-2  " />
                                                        <div class="form-check form-switch mt-2 ">
                                                            <input type="checkbox" class="form-check-input" id="cust_darklayout"
                                                                name="cust_darklayout"
                                                                <?php if($settings['cust_darklayout'] == 'on'): ?> checked <?php endif; ?> />

                                                            <label class="form-check-label f-w-600 pl-1"
                                                                for="cust_darklayout"><?php echo e(__('Dark Layout')); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">

                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>


                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

                <div class="" id="email-setting">
                    <?php echo e(Form::open(['route' => 'email.settings', 'method' => 'post'])); ?>

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Email Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_driver', __('Mail Driver'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')])); ?>

                                            <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_driver"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_host', __('Mail Host'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Driver')])); ?>

                                            <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_driver"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_port', __('Mail Port'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

                                            <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_port"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_username', __('Mail Username'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

                                            <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_username"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_password', __('Mail Password'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_password', env('MAIL_PASSWORD'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')])); ?>

                                            <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_password"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                            <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_encryption"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_from_address', __('Mail From Address'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

                                            <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_from_address"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_from_name', __('Mail From Name'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')])); ?>

                                            <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_from_name"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="#" class="btn btn-xs btn-primary" data-ajax-popup="true"
                                                data-title="<?php echo e(__('Send Test Mail')); ?>"
                                                data-url="<?php echo e(route('test.mail')); ?>">
                                                <?php echo e(__('Send Test Mail')); ?>

                                            </a>

                                        </div>
                                        <div class="text-end col-md-6">
                                            <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
                <div class="card" id="payment-setting">
                    <div class="card-header">
                        <h5><?php echo e('Payment Setting'); ?></h5>
                        <small
                            class="text-secondary font-weight-bold"><?php echo e(__('This detail will use for collect payment on plan from company . On plan company will find out pay now button based on your below configuration.')); ?></small>
                    </div>
                    <?php echo e(Form::open(['route' => 'payment.settings', 'method' => 'post'])); ?>

                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="col-form-label"><?php echo e(__('Currency')); ?> *</label>
                                        <?php echo e(Form::text('currency', env('CURRENCY'), ['class' => 'form-control font-style', 'required', 'placeholder' => __('Enter Currency')])); ?>

                                        <small class="text-xs">
                                            <?php echo e(__('Note: Add currency code as per three-letter ISO code')); ?>.
                                            <a href="https://stripe.com/docs/currencies"
                                                target="_blank"><?php echo e(__('you can find out here..')); ?></a>
                                        </small>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="currency_symbol"
                                            class="col-form-label"><?php echo e(__('Currency Symbol')); ?></label>
                                        <?php echo e(Form::text('currency_symbol', env('CURRENCY_SYMBOL'), ['class' => 'form-control', 'required', 'placeholder' => __('Enter Currency Symbol')])); ?>

                                    </div>
                                </div>
                                <div class="faq justify-content-center">
                                    <div class="row">


                                        <div class="col-sm-12 col-md-12 col-xxl-12">
                                            <div class="accordion accordion-flush" id="accordionExample">


                        <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading-2-2">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse0"
                                                            aria-expanded="true" aria-controls="collapse0">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Stripe')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse0" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-2" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">

                                                                <div class="col-12 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_stripe_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_stripe_enabled" id="is_stripe_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_stripe_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    </div>

                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">

                                                                        <?php echo e(Form::label('stripe_key', __('Stripe Key'), ['class' => 'col-form-label'])); ?>

                                                                        <?php echo e(Form::text('stripe_key', isset($admin_payment_setting['stripe_key']) ? $admin_payment_setting['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Stripe Key')])); ?>

                                                                        <?php if($errors->has('stripe_key')): ?>
                                                                            <span class="invalid-feedback d-block">
                                                                                <?php echo e($errors->first('stripe_key')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">

                                                                        <?php echo e(Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'col-form-label'])); ?>

                                                                        <?php echo e(Form::text('stripe_secret', isset($admin_payment_setting['stripe_secret']) ? $admin_payment_setting['stripe_secret'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Stripe Secret')])); ?>

                                                                        <?php if($errors->has('stripe_secret')): ?>
                                                                            <span class="invalid-feedback d-block">
                                                                                <?php echo e($errors->first('stripe_secret')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading-2-2">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse1"
                                                            aria-expanded="true" aria-controls="collapse1">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Paypal')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse1" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-2" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">

                                                                <div class="col-12 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_paypal_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_paypal_enabled" id="is_paypal_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_paypal_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="mr-2"
                                                                        style="margin-right: 15px;">
                                                                        <div class="border card p-3">
                                                                            <div class="form-check">
                                                                                <label class="form-check-labe text-dark">
                                                                                    <input type="radio" name="paypal_mode"
                                                                                        value="sandbox"
                                                                                        class="form-check-input"
                                                                                        <?php echo e((isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == '') || (isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                                    <?php echo e(__('Sandbox')); ?>

                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mr-2">
                                                                        <div class="border card p-3">
                                                                            <div class="form-check">
                                                                                <label class="form-check-labe text-dark">
                                                                                    <input type="radio" name="paypal_mode"
                                                                                        value="live"
                                                                                        class="form-check-input"
                                                                                        <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                    <?php echo e(__('Live')); ?>

                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label"
                                                                            for="paypal_client_id"><?php echo e(__('Client ID')); ?></label>
                                                                        <input type="text" name="paypal_client_id"
                                                                            id="paypal_client_id" class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['paypal_client_id']) || is_null($admin_payment_setting['paypal_client_id']) ? '' : $admin_payment_setting['paypal_client_id']); ?>"
                                                                            placeholder="<?php echo e(__('Client ID')); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label"
                                                                            for="paypal_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                        <input type="text" name="paypal_secret_key"
                                                                            id="paypal_secret_key" class="form-control"
                                                                            value="<?php echo e(isset($admin_payment_setting['paypal_secret_key']) ? $admin_payment_setting['paypal_secret_key'] : ''); ?>"
                                                                            placeholder="<?php echo e(__('Secret Key')); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading-2-2">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse2"
                                                            aria-expanded="true" aria-controls="collapse2">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Paystack')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse2" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-2" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">

                                                                <div class="col-12 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_paystack_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_paystack_enabled"
                                                                            id="is_paystack_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_paystack_enabled"><?php echo e(__('Enable')); ?></label>

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_client_id"
                                                                            class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                        <input type="text" name="paystack_public_key"
                                                                            id="paystack_public_key" class="form-control"
                                                                            value="<?php echo e(isset($admin_payment_setting['paystack_public_key']) ? $admin_payment_setting['paystack_public_key'] : ''); ?>"
                                                                            placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paystack_secret_key"
                                                                            class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                        <input type="text" name="paystack_secret_key"
                                                                            id="paystack_secret_key" class="form-control"
                                                                            value="<?php echo e(isset($admin_payment_setting['paystack_secret_key']) ? $admin_payment_setting['paystack_secret_key'] : ''); ?>"
                                                                            placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- FLUTTERWAVE -->
                                                
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading-2-5">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse3"
                                                            aria-expanded="true" aria-controls="collapse3">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Flutterwave')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse3" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-5" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">

                                                                <div class="col-12 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_flutterwave_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_flutterwave_enabled"
                                                                            id="is_flutterwave_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_flutterwave_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_client_id"
                                                                            class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                        <input type="text" name="flutterwave_public_key"
                                                                            id="flutterwave_public_key"
                                                                            class="form-control"
                                                                            value="<?php echo e(isset($admin_payment_setting['flutterwave_public_key']) ? $admin_payment_setting['flutterwave_public_key'] : ''); ?>"
                                                                            placeholder="Public Key">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paystack_secret_key"
                                                                            class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                        <input type="text" name="flutterwave_secret_key"
                                                                            id="flutterwave_secret_key"
                                                                            class="form-control"
                                                                            value="<?php echo e(isset($admin_payment_setting['flutterwave_secret_key']) ? $admin_payment_setting['flutterwave_secret_key'] : ''); ?>"
                                                                            placeholder="Secret Key">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                

                                                <!-- Razorpay -->

                                                

                                                
                                                <!-- CoinGate -->
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading-2-11">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse10"
                                                            aria-expanded="true" aria-controls="collapse10">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('CoinGate')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse10" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-11" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">

                                                                <div class="col-12 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_coingate_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_coingate_enabled"
                                                                            id="is_coingate_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_coingate_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 pb-4">
                                                                    <label class="col-form-label"
                                                                        for="coingate_mode"><?php echo e(__('CoinGate Mode')); ?></label>
                                                                    <br>
                                                                    <div class="d-flex">
                                                                        <div class="mr-2"
                                                                            style="margin-right: 15px;">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="coingate_mode"
                                                                                            value="sandbox"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($admin_payment_setting['coingate_mode']) || $admin_payment_setting['coingate_mode'] == '' || $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="coingate_mode"
                                                                                            value="live"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Live')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="coingate_auth_token"
                                                                            class="col-form-label"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                                        <input type="text" name="coingate_auth_token"
                                                                            id="coingate_auth_token" class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['coingate_auth_token']) || is_null($admin_payment_setting['coingate_auth_token']) ? '' : $admin_payment_setting['coingate_auth_token']); ?>"
                                                                            placeholder="CoinGate Auth Token">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                
                                                <!-- PaymentWall -->


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn-submit btn btn-primary" type="submit">
                            <?php echo e(__('Save Changes')); ?>

                        </button>
                    </div>
                    </form>
                </div>
                <div class="" id="pusher-setting">
                    <?php echo e(Form::open(['route' => 'pusher.settings', 'method' => 'post'])); ?>

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <h5><?php echo e(__('Pusher Setting')); ?></h5><small
                                                class="text-secondary font-weight-bold"></small>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="pusher_app_id"
                                                class="col-form-label"><?php echo e(__('Pusher App Id')); ?></label>
                                            <input class="form-control" placeholder="Enter Pusher App Id"
                                                name="pusher_app_id" type="text" value="<?php echo e(env('PUSHER_APP_ID')); ?>"
                                                id="pusher_app_id">

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="pusher_app_key"
                                                class="col-form-label"><?php echo e(__('Pusher App Key')); ?></label>
                                            <input class="form-control " placeholder="Enter Pusher App Key"
                                                name="pusher_app_key" type="text" value="<?php echo e(env('PUSHER_APP_KEY')); ?>"
                                                id="pusher_app_key">

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="pusher_app_secret"
                                                class="col-form-label"><?php echo e(__('Pusher App Secret')); ?></label>
                                            <input class="form-control " placeholder="Enter Pusher App Secret"
                                                name="pusher_app_secret" type="text"
                                                value="<?php echo e(env('PUSHER_APP_SECRET')); ?>" id="pusher_app_secret">

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="pusher_app_cluster"
                                                class="col-form-label"><?php echo e(__('Pusher App Cluster')); ?></label>
                                            <input class="form-control " placeholder="Enter Pusher App Cluster"
                                                name="pusher_app_cluster" type="text"
                                                value="<?php echo e(env('PUSHER_APP_CLUSTER')); ?>" id="pusher_app_cluster">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">

                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>


                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
                <div id="recaptcha-print-setting" class="card">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo e(route('recaptcha.settings.store')); ?>" accept-charset="UTF-8">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                            target="_blank" class="text-blue">
                                            <h5 class=""><?php echo e(__('ReCaptcha settings')); ?></h5><small
                                                class="text-secondary font-weight-bold">(<?php echo e(__('How to Get Google reCaptcha Site and Secret key')); ?>)</small>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 text-end">
                                        <div class="col switch-width">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary"
                                                    class="" name="recaptcha_module" id="recaptcha_module"
                                                    value="yes"
                                                    <?php echo e(env('RECAPTCHA_MODULE') == 'yes' ? 'checked="checked"' : ''); ?>>
                                                <label class="custom-control-label form-control-label px-2"
                                                    for="recaptcha_module "></label><br>
                                                <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                    target="_blank" class="text-blue">

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <label for="google_recaptcha_key"
                                            class="form-label"><?php echo e(__('Google Recaptcha Key')); ?></label>
                                        <input class="form-control"
                                            placeholder="<?php echo e(__('Enter Google Recaptcha Key')); ?>"
                                            name="google_recaptcha_key" type="text"
                                            value="<?php echo e(env('NOCAPTCHA_SITEKEY')); ?>" id="google_recaptcha_key">

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <label for="google_recaptcha_secret"
                                            class="form-label"><?php echo e(__('Google Recaptcha Secret')); ?></label>
                                        <input class="form-control "
                                            placeholder="<?php echo e(__('Enter Google Recaptcha Secret')); ?>"
                                            name="google_recaptcha_secret" type="text"
                                            value="<?php echo e(env('NOCAPTCHA_SECRET')); ?>" id="google_recaptcha_secret">

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">

                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\repose\webapp\resources\views/setting/system_settings.blade.php ENDPATH**/ ?>