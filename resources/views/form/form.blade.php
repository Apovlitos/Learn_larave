@csrf
<label for="inputEmail">Название:</label>
<input type="text" id="inputEmail" class="form-control" name="title" value="{{ old('title', $article->title) }}"
       minlength="5"
       maxlength="100">
<label for="inputPassword">Тэги:</label>
<input type="text" id="tags" class="form-control" value="{{ old('tags', $tags ?? '') }}" name="tags">
<label for="inputPassword">Описание:</label>
<textarea id="inputPassword" class="form-control" name="description" rows="3"
          maxlength="255">{{ old('description', $article->description) }}</textarea>
<label for="inputPassword">Содержание:</label>
<textarea id="inputPassword" class="form-control" name="content"
          rows="10">{{ old('content', $article->content) }}</textarea>
<div class="form-check">
    <input
        class="form-check-input"
        type="checkbox"
        id="check"
        name="published"
        @if($article->published)
           checked
        @endif
    >
    <label class="form-check-label" for="check">
        Опубликовать
    </label>
</div>
<button type="submit" class="w-20 btn btn-lg btn-primary mt-3">Отправить</button>
