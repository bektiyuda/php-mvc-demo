<a href="?c=Post&m=create_form">Create Post</a>
<?php

if (!$posts->num_rows) {
    echo 'No posts.';
} else {
    while ($post = $posts->fetch_object()) {
        echo "<h3>$post->title</h3>";
        echo "<a href=\"?c=Post&m=edit&id=$post->id\">Edit</a>";

        printf('<form action="?c=Post&m=delete" method="post"><input type="hidden" name="id" value="%d"><input type="submit" value="Delete"></form>', $post->id);

        echo "<p align=\"justify\">$post->content</p>";

        ?>
        <form action="?c=Post&m=edit_process" method="post">
            <input type="hidden" name="id" value="<?php echo $post->id; ?>">
            <label>
                Title:
                <input type="text" name="title" value="<?php echo $post->title; ?>" required autofocus>
            </label>
            <br>
            <label>
                Content:
                <textarea name="content" cols="30" rows="10" required><?php echo $post->content; ?></textarea>
            </label>
            <br>
            <input type="submit" value="Post">
        </form>
        <?php
    }
}