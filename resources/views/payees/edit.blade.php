
{{ Form::model($payee, ['route' => ['payees.update', $payee->id], 'method' => 'PUT']) }}
<div class="modal-body">
    <div class="row">
        <div class="form-group">
            {{ Form::label('payee_name', __('Beneficiary Name'), ['class' => 'form-label']) }}
            {{ Form::text('payee_name', null, ['class' => 'form-control', 'placeholder' => __('Enter Beneficiary Name')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('contact_number', __('Contact Number'), ['class' => 'form-label']) }}
            {{ Form::text('contact_number', null, ['class' => 'form-control','placeholder' => __('Enter Contact Number')]) }}
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn  btn-primary">
</div>
{{ Form::close() }}
