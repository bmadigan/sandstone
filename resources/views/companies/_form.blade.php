<div class="card-section border-b">

    <div class="form-group {{ $errors->first('company_name', 'has-error') }}">
        <label class="form-label">Company Name</label>
        {{ Form::text('company_name', $company->company_name, ['class' => 'form-control', 'placeholder' => 'Acme Corporation']) }}
    </div>

    <div class="row">
        <div class="col col-md-6">
            <div class="form-group {{ $errors->first('street_address', 'has-error') }}">
                <label class="form-label">Street Address</label>
                {{ Form::text('street_address', $company->street_address, ['class' => 'form-control', 'placeholder' => '123 Park Ave.']) }}
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group {{ $errors->first('secondary_address', 'has-error') }}">
                <label class="form-label">Suite or Apt #</label>
                {{ Form::text('secondary_address', $company->secondary_address, ['class' => 'form-control', 'placeholder' => 'Suite ABC123']) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-4">
            <div class="form-group {{ $errors->first('city', 'has-error') }}">
                <label class="form-label">City</label>
                {{ Form::text('city', $company->city, ['class' => 'form-control', 'placeholder' => 'New York']) }}
            </div>
        </div>
        <div class="col col-md-4">
            <div class="form-group {{ $errors->first('state', 'has-error') }}">
                <label class="form-label">State</label>
                {{ Form::select('state', getUSStates(), $company->state, [
                    'placeholder' => 'Select A State ...',
                    'class' => 'form-control'
                ])}}
            </div>
        </div>
        <div class="col col-md-4">
            <div class="form-group {{ $errors->first('country', 'has-error') }}">
                <label class="form-label">Country</label>
                {{ Form::select('country', [
                        'US' => 'United States', 'CA' => 'Canada'
                    ], $company->country, [
                        'placeholder' => 'Select A Country ...',
                        'class' => 'form-control'
                    ]) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-4">
            <div class="form-group {{ $errors->first('zipcode', 'has-error') }}">
                <label class="form-label">Zip Code</label>
                {{ Form::text('zipcode', $company->zipcode, ['class' => 'form-control', 'placeholder' => '90210']) }}
            </div>
        </div>
        <div class="col col-md-4">
            <div class="form-group {{ $errors->first('contact_name', 'has-error') }}">
                <label class="form-label">Contact Name</label>
                {{ Form::text('contact_name', $company->contact_name, ['class' => 'form-control', 'placeholder' => 'Steven Smith']) }}
            </div>
        </div>
        <div class="col col-md-4">
            <div class="form-group {{ $errors->first('contact_email', 'has-error') }}">
                <label class="form-label">Contact Email</label>
                {{ Form::text('contact_email', $company->contact_email, ['class' => 'form-control', 'placeholder' => 'ssmith@company.com']) }}
            </div>
        </div>
    </div>

</div>
