// Function to start webcam and capture frames
function startWebcam() {
    // Get the video element
    var video = document.getElementById('video');

    // Check if getUserMedia is available
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
            video: true
        })
            .then(function (stream) {
                // Display the video stream in the video element
                video.srcObject = stream;
                video.play();
            })
            .catch(function (err) {
                console.error('Error accessing the webcam: ', err);
            });
    }
}

// Function to capture photo from webcam
function capturePhoto() {
    // Get the video element and canvas
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');

    // Set canvas dimensions to match video stream
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    // Draw current frame from video to canvas
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Call the function to set the value of the photo_data input
    setCanvasDataURL();
}

// Function to set the value of the photo_data input
function setCanvasDataURL() {
    var canvas = document.getElementById('canvas');
    var photo_data_input = document.getElementById('photo_data');

    // Get the data URL from the canvas
    var dataURL = canvas.toDataURL('image/jpeg');

    // Set the value of the photo_data input
    photo_data_input.value = dataURL;

    // Debugging: Log the length of the dataURL
    console.log("Data URL Length: " + dataURL.length);
}