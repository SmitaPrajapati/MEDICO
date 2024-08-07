document.addEventListener("DOMContentLoaded", function() {
    const profileDetails = document.getElementById('profileDetails');

    async function showProfile() {
        document.getElementById('profile').style.display = 'block';
        document.getElementById('donorForm').style.display = 'none';

        try {
            const donor = await fetchDonorData();
            if (donor && donor.d_fname) {
                profileDetails.innerHTML = `
                    First Name: ${donor.d_fname}<br>
                    Last Name: ${donor.d_lname}<br>
                    Email: ${donor.d_email}<br>
                    Phone: ${donor.d_phone}
                `;
            } else {
                profileDetails.innerHTML = 'Donor not found.';
            }
        } catch (err) {
            console.error('Error fetching donor data:', err);
            profileDetails.innerHTML = 'Failed to load donor data.';
        }
    }

    function showDonorForm() {
        document.getElementById('profile').style.display = 'none';
        document.getElementById('donorForm').style.display = 'block';
    }

    async function submitForm(event) {
        event.preventDefault();

        const formData = new FormData(document.getElementById('form'));

        try {
            const response = await fetch('submitDonorForm.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            if (data.success) {
                alert(data.message);
                document.getElementById('form').reset();
            } else {
                alert(data.message);
            }
        } catch (err) {
            console.error('Error submitting form:', err);
            alert('Failed to submit.');
        }
    }

    function logout() {
        window.location.href = 'dlogin.php'; // Redirect to login page
    }

    async function fetchDonorData() {
        try {
            const response = await fetch('getDonorData.php');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return await response.json();
        } catch (error) {
            console.error('Error fetching donor data:', error);
            throw error;
        }
    }

    window.showProfile = showProfile;
    window.showDonorForm = showDonorForm;
    window.submitForm = submitForm;
    window.logout = logout;
});
