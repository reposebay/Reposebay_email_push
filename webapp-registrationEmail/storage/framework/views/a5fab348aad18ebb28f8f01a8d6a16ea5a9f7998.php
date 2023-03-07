
<?php
$setting = App\Models\Utility::colorset();

$color = 'theme-3';
if (!empty($setting)) {
    $color = $setting;
}



$currantLang = Cookie::get('LANGUAGE');
if (!isset($currantLang)) {
    $currantLang = 'en';
}

$cust_theme_bg = Cookie::get('cust_theme_bg');
if ($cust_theme_bg == '') {
    $cust_theme_bg = 'on';
}

$cust_darklayout = Cookie::get('cust_darklayout');
if ($cust_darklayout == '') {
    $cust_darklayout = 'off';
}

?>
 
<?php if($get == 'saved'): ?>
    <table class="messenger-list-item m-li-divider <?php if('user_'.Auth::user()->id == $id && $id != "0"): ?> m-list-active <?php endif; ?>">
        <tr data-action="0">
            
            <td>
            <?php if($color == "theme-1"): ?>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="far fa-bookmark" style="font-size: 22px; color: #eb8100; "></span>
            </div>
            <?php endif; ?>
             <?php if($color == "theme-2"): ?>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="far fa-bookmark" style="font-size: 22px; color: #000000; "></span>
            </div>
            <?php endif; ?>
             <?php if($color == "theme-3"): ?>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="far fa-bookmark" style="font-size: 22px; color: #169aa6; "></span>
            </div>
            <?php endif; ?>
             <?php if($color == "theme-4"): ?>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="far fa-bookmark" style="font-size: 22px; color: #584ed2; "></span>
            </div>
            <?php endif; ?>

            </td>
            
            <td style="width: 100%;">
                <p data-id="<?php echo e('user_'.Auth::user()->id); ?>" style="text-align: start;">Saved Messages <span>You</span></p>
                <span style="justify-content: left;display: flex;">Save messages secretly</span>
            </td>
        </tr>
    </table>
<?php endif; ?>


<?php if(!empty($user) && $user->count() > 0): ?>

<?php if($get == 'users'): ?>
<table class="messenger-list-item <?php if($user->id == $id && $id != "0"): ?> m-list-active <?php endif; ?>" data-contact="<?php echo e($user->id); ?>">
    <tr data-action="0">
        
        <td style="position: relative">
            <?php if($user->active_status): ?>
                <span class="activeStatus"></span>
            <?php endif; ?>
                 <?php if(!empty($user->avatar)): ?>
        <div class="avatar av-m" 
        style="background-image: url('<?php echo e(asset('/storage/uploads/'.config('chatify.user_avatar.folder').'/'.$user->avatar)); ?>');">
        </div>
          <?php else: ?>
         <div class="avatar av-m"
                         style="background-image: url('<?php echo e(asset('/storage/uploads/'.config('chatify.user_avatar.folder').'/avatar.png')); ?>');">
                    </div>
                <?php endif; ?>
        </td>
        
        <?php if(!empty($lastMessage)): ?>

            <td style="width: 100%;">
            <p data-id="<?php echo e($type.'_'.$user->id); ?>"   style="text-align: start;">
                <?php echo e(strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name); ?> 
                <span><?php echo e($lastMessage->created_at->diffForHumans()); ?></span></p>
            <span style="justify-content: left;display: flex;">
                
                <?php echo $lastMessage->from_id == Auth::user()->id 
                    ? '<span class="lastMessageIndicator">You :</span>'
                    : ''; ?>

                
                <?php if($lastMessage->attachment == null): ?>
                <?php echo strlen($lastMessage->body) > 30 
                    ? trim(substr($lastMessage->body, 0, 30)).'..'
                    : $lastMessage->body; ?>

                <?php else: ?>
                <span class="fas fa-file"></span> Attachment
                <?php endif; ?>
            </span>
            
                <?php echo $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : ''; ?>

            </td>
            <?php else: ?>
            <td></td>
        <?php endif; ?>
        
    </tr>
</table>
<?php endif; ?>


<?php if($get == 'search_item'): ?>
<table class="messenger-list-item" data-contact="<?php echo e($user->id); ?>">
    <tr data-action="0">
        
            <td style="position: relative">
             <?php if($user->active_status): ?>
                    <span class="activeStatus"></span>
                <?php endif; ?>

          <?php if(!empty($user->avatar)): ?>   
        <div class="avatar av-m"
        style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar)); ?>');">
        </div>
         <?php else: ?>
         <div class="avatar av-m"
                         style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png')); ?>');">
                    </div>
                <?php endif; ?>
        </td>
        
        <td>
        <p data-id="<?php echo e($type.'_'.$user->id); ?>">
            <?php echo e(strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name); ?> 
        </td>
        
    </tr>
</table>
<?php endif; ?>





<?php if($get == 'all_members'): ?>
    <table class="messenger-list-item" data-contact="<?php echo e($user->id); ?>">
        <tr data-action="0">
            
            <td style="position: relative">
                <?php if($user->active_status): ?>
                    <span class="activeStatus"></span>
                <?php endif; ?>
                <?php if(!empty($user->avatar)): ?>
                    <div class="avatar av-m"
                         style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar)); ?>');">
                    </div>
                <?php else: ?>
                    <div class="avatar av-m"
                         style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png')); ?>');">
                    </div>
                <?php endif; ?>
            </td>
            
            <td>
                <p data-id="<?php echo e($type.'_'.$user->id); ?>">
                <?php echo e(strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name); ?>

            </td>

        </tr>
    </table>
<?php endif; ?>
<?php endif; ?>

<?php if($get == 'sharedPhoto'): ?>
<div class="shared-photo chat-image" style="background-image: url('<?php echo e($image); ?>')"></div>
<?php endif; ?>




 

<?php /**PATH C:\xampp\htdocs\repose\webapp\resources\views/vendor/Chatify/layouts/listItem.blade.php ENDPATH**/ ?>