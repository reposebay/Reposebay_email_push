<?php echo e(Form::open(['url' => 'payees', 'method' => 'post'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group">
            <?php echo e(Form::label('payee_name', __('Beneficiary Name'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('payee_name', null, ['class' => 'form-control', 'placeholder' => __('Enter Beneficiary Name')])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('contact_number', __('Contact Number'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('contact_number', null, ['class' => 'form-control','placeholder' => __('Enter Contact Number')])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/repoxhpm/app.reposebay.com/resources/views/payees/create.blade.php ENDPATH**/ ?>