// document.addEventListener('DOMContentLoaded', function() {
//     const donorForm = document.getElementById('donor-form');
//     const donorPassword = document.getElementById('donor-password');
//     const donorConfirmPassword = document.getElementById('donor-confirm-password');
//     const donorWarning = document.getElementById('donor-warning');

//     const receiverForm = document.getElementById('receiver-form');
//     const receiverPassword = document.getElementById('receiver-password');
//     const receiverConfirmPassword = document.getElementById('receiver-confirm-password');
//     const receiverWarning = document.getElementById('receiver-warning');

//     donorForm.addEventListener('submit', function(event) {
//         if (donorPassword.value !== donorConfirmPassword.value) {
//             donorWarning.textContent = 'Passwords do not match';
//             event.preventDefault();
//         } else {
//             donorWarning.textContent = '';
//         }
//     });

//     receiverForm.addEventListener('submit', function(event) {
//         if (receiverPassword.value !== receiverConfirmPassword.value) {
//             receiverWarning.textContent = 'Passwords do not match';
//             event.preventDefault();
//         } else {
//             receiverWarning.textContent = '';
//         }
//     });
// });