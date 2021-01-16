@csrf
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="choose_platform">Choose platform</label>
        <select name="choose_platform" id="type" class="form-control form-control-sm {{ $errors->has('choose_platform') ? 'is-invalid' : '' }}">
            <option>Choose platform </option>
            <option value="programming_language">Programming language</option>
            <option value="framework" {{ $skill->choose_platform == 'framework' ? 'selected' : ' ' }}>Framework</option>
            <option value="library" {{ $skill->choose_platform == 'library' ? 'selected' : ' ' }}>Library</option>
            <option value="database" {{ $skill->choose_platform == 'database' ? 'selected' : ' ' }}>Database</option>
            <option value="web_design" {{ $skill->choose_platform == 'web_design' ? 'selected' : ' ' }}>Front End</option>
            <option value="other_tool" {{ $skill->choose_platform == 'other_tool' ? 'selected' : ' ' }}>Other Skill</option>
        
        </select>

        @if ($errors->has('choose_platform'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('choose_platform') }}</strong>
            </div>
        @endif

    </div>

     <div class="form-group col-md-4">
        <label for="expertise_level">Expertise Level</label>
        <select name="expertise_level" id="choose_platform" class="form-control form-control-sm {{ $errors->has('expertise_level') ? 'is-invalid' : '' }}">
            
            <option>Choose Expertise Level </option>
            <option value="expert" {{ $skill->expertise_level == 'expert' ? 'selected' : ' ' }}>Expert</option>    
            <option value="intermediate" {{ $skill->expertise_level == 'intermediate' ? 'selected' : ' ' }}>Intermediate</option>    
            <option value="beginner" {{ $skill->expertise_level == 'beginner' ? 'selected' : ' ' }}>Beginner</option>    
        </select>

         @if ($errors->has('expertise_level'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('expertise_level') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input type="text" value="{{ old('title', $skill->title) }}" name="title"
            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Post title">

        @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
    </div>
    
</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
