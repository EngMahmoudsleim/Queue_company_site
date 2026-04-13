@csrf
<div class="row g-3">
  <div class="col-md-6"><label class="form-label required">Title</label><input class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$project->title) }}"></div>
  <div class="col-md-6"><label class="form-label required">Slug</label><input class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug',$project->slug) }}"></div>
  <div class="col-12"><label class="form-label required">Short Description</label><textarea class="form-control" name="short_description" rows="2">{{ old('short_description',$project->short_description) }}</textarea></div>
  <div class="col-12"><label class="form-label required">Full Description</label><textarea class="form-control" name="full_description" rows="5">{{ old('full_description',$project->full_description) }}</textarea></div>
  <div class="col-md-6"><label class="form-label">Upload Featured Image</label><input type="file" class="form-control" name="featured_image_file" accept="image/*"></div>
  <div class="col-md-6">
    <label class="form-label">Current Featured Image</label>
    <div class="border rounded p-2 bg-light text-center">
      <img src="{{ $project->featured_image_url }}" alt="Current featured image" class="img-fluid rounded" style="max-height: 120px;">
    </div>
  </div>
  <div class="col-md-3"><label class="form-label required">Category</label><input class="form-control" name="category" value="{{ old('category',$project->category) }}"></div>
  <div class="col-md-3"><label class="form-label">Project Type</label><select class="form-select" name="project_type">@foreach(['web','saas','desktop','mobile','offline'] as $type)<option value="{{ $type }}" @selected(old('project_type',$project->project_type ?? 'web')===$type)>{{ ucfirst($type) }}</option>@endforeach</select></div>
  <div class="col-md-3"><label class="form-label">Industry</label><input class="form-control" name="industry" value="{{ old('industry',$project->industry) }}"></div>
  <div class="col-md-3"><label class="form-label required">Status</label><select class="form-select" name="status">@foreach(['active','coming_soon','private_demo'] as $status)<option value="{{ $status }}" @selected(old('status',$project->status)===$status)>{{ ucfirst(str_replace('_',' ',$status)) }}</option>@endforeach</select></div>
  <div class="col-md-4"><label class="form-label">Deployment Mode</label><input class="form-control" name="deployment_mode" value="{{ old('deployment_mode',$project->deployment_mode) }}"></div>
  <div class="col-md-4"><label class="form-label">Supported Platforms (one per line)</label><textarea class="form-control" name="supported_platforms" rows="3">{{ old('supported_platforms', is_array($project->supported_platforms??null) ? implode(PHP_EOL,$project->supported_platforms) : '') }}</textarea></div>
  <div class="col-md-2"><label class="form-label">Sort</label><input type="number" class="form-control" name="sort_order" value="{{ old('sort_order',$project->sort_order ?? 0) }}"></div>
  <div class="col-md-2 d-flex align-items-end"><label class="form-check"><input class="form-check-input" type="checkbox" name="is_featured" value="1" @checked(old('is_featured',$project->is_featured))><span class="form-check-label">Featured</span></label></div>
  <div class="col-md-6"><label class="form-label">Demo URL</label><input class="form-control" name="demo_url" value="{{ old('demo_url',$project->demo_url) }}"></div>
  <div class="col-md-3"><label class="form-label">Demo Username</label><input class="form-control" name="demo_username" value="{{ old('demo_username',$project->demo_username) }}"></div>
  <div class="col-md-3"><label class="form-label">Demo Password</label><input class="form-control" name="demo_password" value="{{ old('demo_password',$project->demo_password) }}"></div>
  <div class="col-12"><label class="form-label">Demo Note</label><input class="form-control" name="demo_note" value="{{ old('demo_note',$project->demo_note) }}" placeholder="Remote demo available / Demo by request"></div>
  <div class="col-md-4"><label class="form-label">Features (one per line)</label><textarea class="form-control" name="features" rows="5">{{ old('features', is_array($project->features??null) ? implode(PHP_EOL,$project->features) : '') }}</textarea></div>
  <div class="col-md-4"><label class="form-label">Tech Stack (one per line)</label><textarea class="form-control" name="tech_stack" rows="5">{{ old('tech_stack', is_array($project->tech_stack??null) ? implode(PHP_EOL,$project->tech_stack) : '') }}</textarea></div>
  <div class="col-md-4">
    <label class="form-label">Gallery Images (multiple)</label>
    <input type="file" class="form-control" name="gallery_images_files[]" accept="image/*" multiple>
    @if(is_array($project->gallery_image_urls) && count($project->gallery_image_urls))
      <div class="d-flex flex-wrap gap-2 mt-2">
        @foreach($project->gallery_image_urls as $image)
          <img src="{{ $image }}" alt="Gallery {{ $loop->iteration }}" class="rounded border" style="width:70px;height:70px;object-fit:cover;">
        @endforeach
      </div>
    @endif
  </div>
  <div class="col-12 d-flex justify-content-end gap-2 pt-2"><a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Cancel</a><button class="btn btn-primary">Save Project</button></div>
</div>
