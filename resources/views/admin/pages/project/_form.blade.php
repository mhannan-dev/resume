@csrf
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="category_id">Project Category</label>
        <select name="category_id" id="category_id"
            class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
            <option>Choose...</option>
            @foreach ($project_category as $category)
            <option value="{{ $category->id }}" @if ($category->id == $project->category_id): selected @else ' '
            @endif> {{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="title">Title</label>
        <input type="text" value="{{ old('title', $project->title) }}" name="title"
            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Post title">

        @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="image">Add Image</label>
        <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image"
            name="image">
    </div>

    <div class="form-group col-md-3">
        <label for="url">Add Url</label>
        <input type="text" class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" id="url"
            name="url">
    </div>



    <div class="form-group col-md-12">

        <label for="body">Body</label>
        <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body" rows="3"
            name="body">{{ old('body', $project->body) }}</textarea>

        @if ($errors->has('body'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('body') }}</strong>
            </div>
        @endif
    </div>
</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
