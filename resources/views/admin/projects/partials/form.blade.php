
<form action="{{ route($route, $project->slug) }}" method="POST" class="form-floating"  enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="row mb-3">
                    {{-- Name --}}
        <div class="col-md">
            <div class="form-floating">
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="nameInput" placeholder="My Project Name" value="{{ old('name', $project->name) }}" name="name">
                <label for="nameInput">Insert the project name</label>
                <div id="nameInput" class="invalid-feedback">
                @error('name')
                    {{$message}}
                @enderror
                </div>
            </div>
        </div>
            {{-- Complexity --}}
        <div class="col-md">
            <div class="form-floating">
                <select name="difficulty_id" id="complexitySelect" class="form-select">
                    @foreach ($difficulties as $difficulty)
                    <option value="{{ $difficulty->id }}"
                        {{ old('difficulty_id', $project->difficulty_id) ==  $difficulty->id ? 'selected' : '' }}> {{ $difficulty->id }}
                    </option>
                @endforeach
                </select>
                <label for="complexitySelect">Project Difficuty</label>
            </div>
        </div>
    </div>
    <div class="row g-3">
                        {{-- Preview Image --}}
        <div class="col-12">
            <div class="">
                <label for="inputPreview">Insert a Preview Project Image</label>
                <input type="file" class="form-control @error('preview') is-invalid @enderror" placeholder="Image Preview" id="inputPreview" name="preview" value="{{  old('preview',  $project->preview) }}">
                <div id="inputPreview" class="invalid-feedback">
                    @error('preview')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
                    {{-- GitHub URL --}}
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control @error('github_url') is-invalid @enderror" placeholder="GitHub URL" id="inputGithubUrl" name="github_url">{{  old('github_url',  $project->github_url) }}</textarea>
                <label for="inputGithubUrl">Insert a GitHub reposity URL</label>
                <div id="inputGithubUrl" class="invalid-feedback">
                    @error('github_url')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-12">
            @foreach ($technologies as $technology)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="technologyCheck" value="{{$technology->id}}" name="technologies[]">
                <label class="form-check-label" for="technologyCheck">{{$technology->name}}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row my-3">
        {{-- Publication Date --}}
        <div class="col-md">
            <div class="form-floating">
                <input type="date" class="form-control  @error('publication_date') is-invalid @enderror" id="dateInput" placeholder="My Project Name" value="{{ old('publication_date', $project->publication_date) }}" name="publication_date" >
                <label for="dateInput">Insert the project publication date</label>
                <div id="validationServer05Feedback" class="invalid-feedback">
                    @error('publication_date')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
                        {{-- Type --}}
            <div class="col-md">
                <div class="form-floating">
                    <select name="type_id" id="typeSelect" class="form-select">
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('type_id', $project->type_id) ==  $type->id ? 'selected' : '' }}> {{ $type->name }}
                        </option>
                    @endforeach
                    </select>
                    <label for="typeSelect">Project Type</label>
                </div>
            </div>
        </div>
        <div class="buttons d-flex justify-content-between">
            <button type="submit" class="btn btn-outline-primary"><i class="fa-regular fa-paper-plane"></i> Submit</button>
            <a href="{{route('admin.projects.index')}}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>

    </div>
</form>