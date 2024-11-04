    <h2>Create New Post</h2>
    <form action="?c=Post&m=create" method="post">
        <label>
            Title:
            <input type="text" name="title" required autofocus>
        </label>
        <br>
        <label>
            Content:
            <textarea name="content" cols="30" rows="10" required></textarea>
        </label>
        <br>
        <input type="submit" value="Create Post">
    </form>
