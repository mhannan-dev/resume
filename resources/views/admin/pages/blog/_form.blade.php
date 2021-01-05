@csrf
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
            <option selected>Choose...</option>
            <option value="1">Category One</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Post title">

        @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif

    </div>

    <div class="form-group col-md-4">
        <label for="image">Add Image</label>
        <input type="file" class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" name="image">
    </div>

    <div class="form-group col-md-12">
        <label for="exampleFormControlFile1">Body</label>
        <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body" name="body" rows="3" placeholder="Post body"></textarea>
        @if ($errors->has('body'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('body') }}</strong>
            </div>
        @endif
    </div>
</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>