@csrf
<div class="form-row">
    
    <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input type="text" value="{{ old('title', $tag->title) }}" name="title"
            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Tag title">

        @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
    </div>





</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
