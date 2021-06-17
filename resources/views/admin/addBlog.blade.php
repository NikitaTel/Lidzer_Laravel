
<section class="admin-add-post-section">
    <form class="admin-add-post" method="post" action="{{route('addpost')}}" enctype="multipart/form-data">
        @csrf
        <div class="admin-add">
            <div>
                <label for="blog_heading">Заголовок блога</label>
                <input type="text" name="blog_heading" id="blog_heading" required>
            </div>

            <div>
                <label for="blog_content">Текст блога</label>
                <textarea name="blog_content" id="blog_content" required></textarea>
            </div>

            <div>
                <label for="blog_image">Изображение</label>
                <input type="file" name="blog_image" id="blog_image" accept=".jpg, .jpeg, .png, .gif" required>
            </div>
        </div>

        <input type="submit" value="Добавить">
    </form>

</section>
