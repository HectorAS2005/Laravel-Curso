@csrf

<label for="title">Title</label>
<input type="text" name="title" value="{{ old('title', $category->title) }}">

<label for="slug">Slug</label>
<input type="text" name="slug" value="{{ old('slug', $category->slug) }}">

<button type="submit">Enviar</button>