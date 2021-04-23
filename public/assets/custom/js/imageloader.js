
function imagePreviewLoader(inputImageId, imageInputLabelId, previewImageId ) {
  console.log("ImagePreviewLoader Running...");

    const imageInput = document.getElementById(inputImageId),
            imageInputLabel = document.getElementById(imageInputLabelId),
            packageImagePreview = document.getElementById(previewImageId);

        let file = imageInput.files[0];

        let reader = new FileReader();

        reader.onloadend = (e) =>{
            // console.log(`Logging Reader Result ${reader.result}`);

            imageInputLabel.innerHTML = file.name;
            packageImagePreview.src = reader.result;
        }

        reader.readAsDataURL(file);
    }

    function resetImageInputAndPreview(inputImageId, imageInputLabelId, previewImageId ) {

      const imageInput = document.getElementById(inputImageId),
            imageInputLabel = document.getElementById(imageInputLabelId),
            packageImagePreview = document.getElementById(previewImageId);
        
            
        imageInput.value = "";
        imageInputLabel.innerHTML = "Choose file";
        // packageImagePreview.src = "./assets/images/placeholder.png";
        var base_url = window.location.origin;
        packageImagePreview.src = `${base_url}/assets/images/placeholder.png`;

    }