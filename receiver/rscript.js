document.addEventListener("DOMContentLoaded", function() {
    const profileDetails = document.getElementById('profileDetails');

    async function showProfile() {
        document.getElementById('profile').style.display = 'block';

        try {
            const receiver = await fetchReceiverData();
            if (receiver && receiver.r_id) {
                profileDetails.innerHTML = `
                    Receiver ID: ${receiver.r_id}<br>
                    First Name: ${receiver.r_fname}<br>
                    Last Name: ${receiver.r_lname}<br>
                    Email: ${receiver.r_email}<br>
                    Phone: ${receiver.r_phone}
                `;
            } else {
                profileDetails.innerHTML = 'Receiver not found.';
            }
        } catch (err) {
            console.error('Error fetching receiver data:', err);
            profileDetails.innerHTML = 'Failed to load receiver data.';
        }
    }

    function logout() {
        window.location.href = 'login.php'; // Redirect to login page
    }

    async function fetchReceiverData() {
        try {
            const response = await fetch('getReceiverData.php');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return await response.json();
        } catch (error) {
            console.error('Error fetching receiver data:', error);
            throw error;
        }
    }

    window.showProfile = showProfile;
    window.logout = logout;
});
