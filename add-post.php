<?php include("./dir-path.php"); ?>
<?php include(ROOT_PATH . "/app/controller/posts.php"); 
UsersOnly();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="./assets/css/stylesheet.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="./assets/css/admin.css">

        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

        <title>Admin Section - Add Post</title>
    </head>

    <body>
        
    <?php include(ROOT_PATH . "/app/includes/header-2.php"); ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="./pages.php" class="btn btn-big">See Posts</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Add Post</h2>

                    <?php include(ROOT_PATH . '/app/helpers/form-validation.php'); ?>

                    <form action="add-post.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
                        </div>
                        <div>
                            <label>Body</label>
                            <textarea name="body" id="body"><?php echo $body ?></textarea>
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image" class="text-input">
                        </div>
                        <div>
                            <label>Topic</label>
                            <select name="topic_id" class="text-input">
                                <option value=""></option>
                                <?php foreach ($topics as $key => $topic): ?>
                                    <?php if (!empty($topic_id) && $topic_id == $topic['id'] ): ?>
                                        <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div>
                            <?php if (empty($published)): ?>
                                <label>
                                    <input type="checkbox" name="published">
                                    Publish
                                </label>
                            <?php else: ?>
                                <label>
                                    <input type="checkbox" name="published" checked>
                                    Publish
                                </label>
                            <?php endif; ?>
                           

                        </div>
                        <div>
                            <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Ckeditor -->
        <script>
            CKEDITOR.replace( 'body' );
        </script>
        <!-- Custom Script -->
        <script src="../assets/js/main.js"></script>

    </body>

</html>