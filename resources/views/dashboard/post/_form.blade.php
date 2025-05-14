@csrf

<label for="title">Title</label>
<input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
@error('title')
    <small class="text-danger">{{ $message }}</small>
@enderror

<label for="slug">Slug</label>
<input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">
@error('slug')
    <small class="text-danger">{{ $message }}</small>
@enderror

<label for="content">Content</label>
<textarea class="form-control" name="content">{{ old('content', $post->content) }}</textarea>
@error('content')
    <small class="text-danger">{{ $message }}</small>
@enderror

<label for="category_id">Category</label>
<select class="form-control" name="category_id">
    @foreach ($categories as $title => $id)
        <option value="{{ $id }}" {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }}>{{ $title }}</option>
    @endforeach
</select>
@error('category_id')
    <small class="text-danger">{{ $message }}</small>
@enderror

<label for="description">Description</label>
<textarea class="form-control" name="description">{{ old('description', $post->description) }}</textarea>
@error('description')
    <small class="text-danger">{{ $message }}</small>
@enderror

<label for="posted">Posted</label>
<select class="form-control" name="posted">
    <option value="no" {{ old('posted', $post->posted) == 'no' ? 'selected' : '' }}>No</option>
    <option value="yes" {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }}>Yes</option>
</select>

@if (isset($task) && $task == 'edit')
    <label for="">Image</label>
    <input type="file" name="image">
@endif

@error('posted')
    <small class="text-danger">{{ $message }}</small>
@enderror

<button type="submit" class="btn btn-success mt-3">Enviar</button>