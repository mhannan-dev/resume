@csrf
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="category_id">Type</label>
        <select name="type" id="type"
            class="form-control form-control-sm {{ $errors->has('type') ? 'is-invalid' : '' }}">
            <option>Choose type</option>
        
            <option value="1" {{ $category->type == '1' ? 'selected' : ' ' }}> Blog Category </option>
            <option value="2" {{ $category->type == '2' ? 'selected' : ' ' }}> Portfolio </option>
            
        </select>

        @if ($errors->has('type'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('type') }}</strong>
            </div>
        @endif

    </div>
    <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input type="text" value="{{ old('title', $category->title) }}" name="title"
            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Post title">

        @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
    </div>
    

    <div class="form-group col-md-4">
        <label for="status">Status</label>
        <select class="form-control" name="status">
            <option>Choose status</option>
            <option value="1" {{ $category->status == '1' ? 'selected' : ' ' }}>Active</option>
            <option value="0" {{ $category->status == '0' ? 'selected' : ' ' }}>Inactive</option>
        </select>
    </div>


</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
