@csrf
<label for="inputEmail">Название:</label>
<input type="text" id="inputEmail" class="form-control" name="title" value="{{ old('title', $article->title) }}" minlength="5"
       maxlength="100">
<label for="inputPassword">Тематика:</label>
<input type="text" id="type" class="form-control" value="{{ old('type', $article->type) }}"  name="type">
<label for="inputPassword">Описание:</label>
<textarea id="inputPassword" class="form-control" name="description" rows="3" maxlength="255">{{ old('description', $article->description) }}</textarea>
<label for="inputPassword">Содержание:</label>
<textarea id="inputPassword" class="form-control" name="content" rows="10">{{ old('content', $article->content) }}</textarea>
<div class="form-check">
    @if(isset($article->published) && $article->published == true)
        <input class="form-check-input" type="checkbox" id="check" name="published" checked>
    @else
        <input class="form-check-input" type="checkbox" id="check" name="published">
    @endif
    <label class="form-check-label" for="check">
        Опубликовать
    </label>
</div>
<button type="submit" class="w-20 btn btn-lg btn-primary mt-3">Отправить</button>
