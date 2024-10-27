<?php require_once "../../blocks/head_user.php"?>
<?php require_once "../../blocks/header_user.php"?>
<style>
    .upload-form {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-header {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group input[type="file"] {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .form-group input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        font-size: 16px;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        width: 100%;
    }

    .form-group input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
    <div class="upload-form">
        <div class="form-header">Upload Image</div>
        <form action="../../../handlers/upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <input type="submit" value="Upload">
            </div>
        </form>
    </div>
<?php require_once "../../blocks/footer_user.php"?>