<div class="card-section border-b">

    <div class="form-group {{ $errors->first('product_name', 'has-error') }}">
        <label class="form-label">Product Name</label>
        {{ Form::text('product_name', $product->product_name, ['class' => 'form-control', 'placeholder' => 'Spark Shoes']) }}
    </div>

    <div class="form-group {{ $errors->first('product_description', 'has-error') }}">
        <label class="form-label">Product Description</label>
        {{ Form::textarea('product_description', $product->product_description, ['class' => 'form-control']) }}
    </div>

    <div class="row">
        <div class="col col-md-6">
            <div class="form-group {{ $errors->first('price', 'has-error') }}">
                <label class="form-label">Product Price</label>
                {{ Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => '$15.00']) }}
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group {{ $errors->first('secondary_address', 'has-error') }}">
                <label class="form-label">Product Image</label>
                {{ Form::text('secondary_address', $product->secondary_address, ['class' => 'form-control', 'placeholder' => '']) }}
            </div>
        </div>
    </div>

</div>
