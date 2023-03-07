<?php echo e(Form::open(['url' => 'ticket', 'method' => 'post'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group">
            <?php echo e(Form::label('title', __('Subject'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Feedback Subject')])); ?>

        </div>
        <?php if(\Auth::user()->type != 'employee'): ?>
            <div class="form-group">
                <?php echo e(Form::label('employee_id', __('Feedback for Employee'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('employee_id', $employees, null, ['class' => 'form-control select2 employee_id','placeholder' => __('Select Employee')])); ?>

            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <?php echo e(Form::label('priority', __('Priority'), ['class' => 'col-form-label'])); ?>

                    <select name="priority" class="form-control select2" id="choices-multiple">
                        <option value="low"><?php echo e(__('Low')); ?></option>
                        <option value="medium"><?php echo e(__('Medium')); ?></option>
                        <option value="high"><?php echo e(__('High')); ?></option>
                        <option value="critical"><?php echo e(__('critical')); ?></option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <?php echo e(Form::label('end_date', __('End Date'), ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::text('end_date', null, ['class' => 'form-control d_week','autocomplete'=>'off'])); ?>

                </div>
            </div>
        </div>
       
        <div class="form-group">
            <?php echo e(Form::label('description', __('Description'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Feedback Description'),'rows'=>'5'])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/repoxhpm/app.reposebay.com/resources/views/ticket/create.blade.php ENDPATH**/ ?>