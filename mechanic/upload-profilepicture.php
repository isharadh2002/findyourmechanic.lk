<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <style>
        .main-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 75vh;
            background-color: #f0f2f5;
            padding-top: 100px;
        }

        .upload-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .upload-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .image-preview {
            width: 100%;
            height: 200px;
            border: 2px dashed #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            position: relative;
            border-radius: 8px;
            overflow: hidden;
        }

        .image-preview__image {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-preview__text {
            color: #aaa;
            font-size: 14px;
        }

        #fileUpload {
            display: none;
        }

        .upload-btn {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        .upload-btn:hover {
            background-color: #0056b3;
        }

        .submit-btn {
            display: inline-block;
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #218838;
        }

        /* Popup Box Styles */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }

        .popup-content p {
            margin-bottom: 20px;
            color: #333;
        }

        .popup-content button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .popup-content button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    require "header.php";
    ?>
    <main class="main-container">
        <div class="upload-container">
            <h2>Upload Profile Picture</h2>
            <form id="uploadForm" method="POST" action="process/update-profilepicture.php" enctype="multipart/form-data">
                <div class="image-preview" id="imagePreview">
                    <img src="" alt="Image Preview" class="image-preview__image">
                    <span class="image-preview__text">Image Preview</span>
                </div>
                <input type="file" name="profilePicture" id="fileUpload" accept="image/*" >
                <label for="fileUpload" class="upload-btn">Choose a Picture</label>
                <button type="submit" class="submit-btn">Upload Picture</button>
            </form>
        </div>
    </main>

    <!-- Popup Box for File Size -->
    <div id="popupSize" class="popup">
        <div class="popup-content">
            <p>File size is too large. Please select a file smaller than 2 MB.</p>
            <button onclick="closePopup('popupSize')">OK</button>
        </div>
    </div>

    <!-- Popup Box for No File Selected -->
    <div id="popupNoFile" class="popup">
        <div class="popup-content">
            <p>No file selected. Please choose a picture to upload.</p>
            <button onclick="closePopup('popupNoFile')">OK</button>
        </div>
    </div>

    <script>
        // script.js
        const fileUpload = document.getElementById('fileUpload');
        const uploadForm = document.getElementById('uploadForm');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewImage = imagePreview.querySelector('.image-preview__image');
        const imagePreviewText = imagePreview.querySelector('.image-preview__text');
        const maxSize = 2 * 1024 * 1024; // 2 MB in bytes

        // Show image preview
        fileUpload.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                if (file.size > maxSize) {
                    showPopup('popupSize'); // Show popup if file is too large
                    this.value = ''; // Clear the input
                } else {
                    const reader = new FileReader();
                    imagePreviewText.style.display = 'none';
                    imagePreviewImage.style.display = 'block';

                    reader.addEventListener('load', function() {
                        imagePreviewImage.setAttribute('src', this.result);
                    });

                    reader.readAsDataURL(file);
                }
            } else {
                imagePreviewText.style.display = null;
                imagePreviewImage.style.display = null;
                imagePreviewImage.setAttribute('src', '');
            }
        });

        // Check if file is selected on form submission
        uploadForm.addEventListener('submit', function(event) {
            if (!fileUpload.value) {
                event.preventDefault(); // Prevent form submission
                showPopup('popupNoFile'); // Show popup if no file selected
            }
        });

        // Show popup
        function showPopup(popupId) {
            document.getElementById(popupId).style.display = 'flex';
        }

        // Close popup
        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }
    </script>

    <?php
    require "../shared/footer.php";
    ?>
</body>

</html>