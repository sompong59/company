document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('submitButton').disabled = true;
    document.getElementById('loadingIndicator').style.display = 'block';
    const formData = new FormData(this);
    fetch('contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('submitButton').disabled = false;
        document.getElementById('loadingIndicator').style.display = 'none';
        const modal = data.success ? document.getElementById('successModal') : document.getElementById('errorModal');
        const modalMessage = data.success ? document.getElementById('modalMessage') : document.getElementById('errorMessage');
        modalMessage.textContent = data.message;
        modal.style.display = 'block';

        // ເພີ່ມ event listener ສຳລັບປຸ່ມ "ສຳເລັດ"
        const modalButton = data.success ? document.getElementById('successModalButton') : document.getElementById('errorModalButton');
        modalButton.onclick = function() {
            modal.style.display = 'none';
        }

        if (data.success) {
            document.getElementById('contactForm').reset();
        }
    })
    .catch(error => {
        document.getElementById('submitButton').disabled = false;
        document.getElementById('loadingIndicator').style.display = 'none';
        alert('ເກີດຂໍ້ຜິດພາດ. ກະລຸນາລອງໃໝ່.');
    });
});