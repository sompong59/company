<?php $pageTitle = "Free Quote Request Form"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="../css/sendfrom.css">
    <link rel="stylesheet" href="../css/social-buttons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <?php include 'header-en.html';?>

    <div class="form-container">
        <h2>Request a Free Quote</h2>

        <form action="../contact.php" method="POST" enctype="multipart/form-data" id="contactForm" novalidate>
            <div class="language-selection">
                <div class="input-group">
                    <label>Source Language <span class="required">*</span></label>
                    <select type="text" name="originalLanguage">
                        <option value="Lao">Lao</option>
                        <option value="English">English</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Vietnamese">Vietnamese</option>
                        <option value="French">French</option>
                        <option value="Thai">Thai</option>
                        <option value="Russian">Russian</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Target Language <span class="required">*</span></label>
                    <select type="text" name="targetLanguage">
                        <option value="English">English</option>
                        <option value="Lao">Lao</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Vietnamese">Vietnamese</option>
                        <option value="French">French</option>
                        <option value="Thai">Thai</option>
                        <option value="Russian">Russian</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                
            </div>
            <div class="input-group">
                <label>Service Type <span class="required">*</span></label>
                <select type="text" name="serviceType">
                    <option value="Rush Translation">Rush Translation</option>
                    <option value="Regular Translation">Regular Translation</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="input-group">
                <label>Attach Your Files (max 5 files) <span class="required">*</span></label>
                <div class="upload-area">
                    <input type="file" name="form_fields[]" multiple="multiple" data-maxsize="10" data-maxsize-message="This file exceeds the maximum allowed size.">
                </div>
            </div>
            <div class="input-group">
                <label>Your Name <span class="required">*</span></label>
                <input type="text" name="name" placeholder="Your Name" required>
            </div>
            <div class="language-column">
                <div class="input-group">
                    <label>Your Email<span class="required">*</span></label>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <label>Your Phone Number <span class="required">*</span></label>
                    <input size="1" type="tel" name="phoneNamber" placeholder="Your Phone Number" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">
                </div>
            </div>
            <div class="input-group">
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Subject" required>
            </div>
            <div class="input-group">
                <label for="message">Message</label>
                <textarea name="text" rows="5" placeholder="Please specify your requirements, such as the purpose of the translation, etc."></textarea>
            </div>
            <button class="submit-button" type="submit" id="submitButton">SEND INQUIRY</button>
            <div id="loadingIndicator" style="display: none;">Sending...</div>
        </form>

        <div id="successModal" class="popup-modal" style="display: none;">
            <div class="modal-body">
                <p id="modalMessage"></p>
                <button id="successModalButton">Done</button>
            </div>
        </div>

        <div id="errorModal" class="popup-modal" style="display: none;">
            <div class="modal-body">
                <p id="errorMessage"></p>
                <button id="errorModalButton">Done</button>
            </div>
        </div>
    </div>
</body>
</html>
    <?php include 'footer-en.html';?>
    <script>
        document.getElementById('contactForm').addEventListener('submit', async function(event) {
    event.preventDefault();
    const submitButton = document.getElementById('submitButton');
    const loadingIndicator = document.getElementById('loadingIndicator');
    const successModal = document.getElementById('successModal');
    const errorModal = document.getElementById('errorModal');
    const modalMessage = document.getElementById('modalMessage');
    const errorMessage = document.getElementById('errorMessage');
    const successModalButton = document.getElementById('successModalButton');
    const errorModalButton = document.getElementById('errorModalButton');

    submitButton.disabled = true;
    loadingIndicator.style.display = 'block'; // Show loadingIndicator first

    // Form validation
    if (!this.name.value || !this.email.value || !this.phoneNamber.value || !this.originalLanguage.value || !this.targetLanguage.value || !this.serviceType.value) {
        errorMessage.textContent = 'Please fill in all required fields.';
        errorModal.style.display = 'block';
        submitButton.disabled = false;
        loadingIndicator.style.display = 'none'; // Hide loadingIndicator if validation fails
        return;
    }

    try {
        const formData = new FormData(this);
        const response = await fetch('../contact.php', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();

        submitButton.disabled = false;
        loadingIndicator.style.display = 'none'; // Hide loadingIndicator after fetch completes

        if (data.success) {
            modalMessage.textContent = data.message;
            successModal.style.display = 'block';
            successModalButton.onclick = function() {
                successModal.style.display = 'none';
            };
            this.reset();
        } else {
            errorMessage.textContent = data.message || 'An error occurred. Please try again.';
            errorModal.style.display = 'block';
            errorModalButton.onclick = function() {
                errorModal.style.display = 'none';
            };
        }
    } catch (error) {
        console.error('Error:', error);
        submitButton.disabled = false;
        loadingIndicator.style.display = 'none'; // Hide loadingIndicator on error
        errorMessage.textContent = 'An error occurred. Please try again.';
        errorModal.style.display = 'block';
        errorModalButton.onclick = function() {
            errorModal.style.display = 'none';
        };
    }
});
    </script>
</body>
</html>