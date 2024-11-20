import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// document.addEventListener('DOMContentLoaded', () => {
//     Dropzone.autoDiscover = false;
//     const dropzoneElement = document.getElementById('dropzone');
//     if (dropzoneElement) {
//         const myDropzone = new Dropzone(dropzoneElement, {
//             url: '/analyze/result',
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//             },
//             paramName: 'image', // Ensure this matches the validation rule in the controller
//             acceptedFiles: 'image/*',
//             maxFilesize: 2, // MB
//             addRemoveLinks: true,
//             autoProcessQueue: false, // Disable auto-process
//             init: function() {
//                 const submitButton = document.querySelector("#submit-all");
//                 const myDropzone = this; // Closure
//
//                 submitButton.addEventListener("click", function() {
//                     myDropzone.processQueue(); // Process the queue when the button is clicked
//                 });
//
//                 // this.on("success", function(file, response) {
//                 //     // Redirect to the result page
//                 //
//                 // });
//                 //
//                 // this.on("error", function(file, response) {
//                 //     // Handle the error response from the server
//                 //     console.log(response);
//                 // });
//             }
//         });
//     }
// });
