@csrf
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id"
            class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
            <option>Choose...</option>
            @foreach ($blog_category as $category)
            <option value="{{ $category->id }}" @if ($category->id == $blog->category_id): selected @else ' '
            @endif> {{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="tag_id">Tag</label>
        
        <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple" style="width:100%;">
            @foreach ($blog_tag as $tag)
                <option value='{{ $tag->id }}'>{{ $tag->title }}</option>
            @endforeach
        </select>

    </div>




    <div class="form-group col-md-3">
        <label for="title">Title</label>
        <input type="text" value="{{ old('title', $blog->title) }}" name="title"
            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Post title">

        @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="image">Add Image</label>
        <input type="file" class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image"
            name="image">
    </div>


    <div class="form-group col-md-3">
        <label for="status">Status</label>
        <select class="form-control" name="status">
            <option>Choose...</option>
            <option value="1" {{ $blog->status == '1' ? 'selected' : ' ' }}>Active</option>
            <option value="0" {{ $blog->status == '0' ? 'selected' : ' ' }}>Inactive</option>
        </select>
    </div>


    <div class="form-group col-md-12">

        <label for="body">Body</label>
        <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body" rows="3"
            name="body">{{ old('body', $blog->body) }}</textarea>

        @if ($errors->has('body'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('body') }}</strong>
            </div>
        @endif
    </div>
</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
