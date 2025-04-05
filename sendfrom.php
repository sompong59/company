<?php $pageTitle = "ຟອມສົ່ງຂໍ້ມູນຂໍໃບສະເໜີລາຄາຟຣີ"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle; ?></title>
    <link rel="shortcut icon" href="img/logo.jpeg" type="">
    <link rel="stylesheet" href="css/sendfrom.css">
    <link rel="stylesheet" href="css/social-buttons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <?php include 'header.html';?>

    <div class="form-container">
        <h2>ຂໍໃບສະເໜີລາຄາຟຣີ</h2>

        <form action="contact.php" method="POST" enctype="multipart/form-data" id="contactForm" novalidate>
            <div class="language-selection">
                <div class="input-group">
                    <label>ເລືອກພາສາຕົ້ນສະບັບ <span class="required">*</span></label>
                    <select type="text" name="originalLanguage">
                        <option value="ພາສາລາວ ">ພາສາລາວ </option>
                        <option value="ພາສາອັງກິດ ">ພາສາອັງກິດ </option>
                        <option value="ພາສາຈີນ ">ພາສາຈີນ </option>
                        <option value="ພາສາຫວຽດນາມ ">ພາສາຫວຽດນາມ </option>
                        <option value="ພາສາຟຣັງ ">ພາສາຟຣັງ </option>
                        <option value="ພາສາໄທ ">ພາສາໄທ </option>
                        <option value="ພາສາລັດເຊຍ ">ພາສາລັດເຊຍ </option>
                        <option value="ອື່ນ ໆ">ອື່ນ ໆ</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>ເລືອກພາສາເປົ້າໝາຍ <span class="required">*</span></label>
                    <select type="text" name="targetLanguage">
                        <option value="ພາສາອັງກິດ ">ພາສາອັງກິດ </option>
                        <option value="ພາສາລາວ ">ພາສາລາວ </option>
                        <option value="ພາສາຈີນ ">ພາສາຈີນ </option>
                        <option value="ພາສາຫວຽດນາມ ">ພາສາຫວຽດນາມ </option>
                        <option value="ພາສາຟຣັງ ">ພາສາຟຣັງ </option>
                        <option value="ພາສາໄທ ">ພາສາໄທ </option>
                        <option value="ພາສາລັດເຊຍ ">ພາສາລັດເຊຍ </option>
                        <option value="ອື່ນ ໆ">ອື່ນ ໆ</option>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <label>ປະເພດການບໍລິການ <span class="required">*</span> </label>
                <select type="text" name="serviceType">
                    <option value="ແປດວນ ">ແປດວນ </option>
                    <option value="ແປປົກກະຕິ ">ແປປົກກະຕິ</option>
                    <option value="ອື່ນ ໆ">ອື່ນ ໆ</option>
                </select>
            </div>
            <div class="input-group">
                <label> ແນບໄຟລ໌ຂອງທ່ານ (ສູງສຸດ 5 ໄຟລ໌) <span class="required">*</span></label>
                <div class="upload-area">
                    <input type="file" name="form_fields[]" multiple="multiple" data-maxsize="10" data-maxsize-message="This file exceeds the maximum allowed size.">
                </div>
            </div>
            <div class="input-group">
                <label>ປ້ອນຂໍ້ມູນຊື່ຂອງທ່ານ <span class="required">*</span></label>
                <input type="text" name="name" placeholder="ຊື່ຂອງຂອງ" required>
            </div>
            <div class="language-column">
                <div class="input-group">
                    <label> ທີ່ຢູ່ອີເມວຂອງທ່ານ <span class="required">*</span></label>
                    <input type="email" name="email" placeholder="ທີ່ຢູອີເມວ" required>
                </div>
                <div class="input-group">
                    <label> ເບີໂທຂອງທ່ານ <span class="required">*</span></label>
                    <input size="1" type="tel" name="phoneNamber" placeholder="ເບີໂທຂອງທ່ານ" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">
                </div>
            </div>
            <div class="input-group">
                <label> ຫົວຂໍ້ (ເລື່ອງ)</label>
                <input type="text" name="subject" placeholder="ຫົວຂໍ້" required>
            </div>
            <div class="input-group">
                <label for="message">ລາຍລະອຽດເພີ່ມເຕີ່ມ</label>
                <textarea name="text" rows="5" placeholder="ກະລຸນາແຈ້ງຄວາມຕ້ອງການຂອງທ່ານ ເຊັ່ນ ຈຸດປະສົງຂອງການໃຊ້ຄໍາແປ ຯລຯ"></textarea>
            </div>
            <button class="submit-button" type="submit" id="submitButton">ສົ່ງຂໍ້ມູນ</button>
            <div id="loadingIndicator" style="display: none;">ກຳລັງສົ່ງ...</div>
        </form>

        <div id="successModal" class="popup-modal" style="display: none;">
            <div class="modal-body">
                <p id="modalMessage"></p>
                <button id="successModalButton">ສຳເລັດ</button>
            </div>
        </div>

        <div id="errorModal" class="popup-modal" style="display: none;">
            <div class="modal-body">
                <p id="errorMessage"></p>
                <button id="errorModalButton">ລອງໃໝ່ອີກຄັ້ງ</button>
            </div>
        </div>
    </div>
    <?php include 'footer.html';?>
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
    loadingIndicator.style.display = 'block'; // ສະແດງ loadingIndicator ກ່ອນ

    // ກວດສອບຟອມ
    if (!this.name.value || !this.email.value || !this.phoneNamber.value || !this.originalLanguage.value || !this.targetLanguage.value || !this.serviceType.value) {
    errorMessage.textContent = 'ກະລຸນາຕື່ມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ..'; // ແຖວທີ່ແກ້ໄຂ
    errorModal.style.display = 'block';
    submitButton.disabled = false;
    loadingIndicator.style.display = 'none';
    return;
}

    try {
        const formData = new FormData(this);
        const response = await fetch('contact.php', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();

        submitButton.disabled = false;
        loadingIndicator.style.display = 'none'; // ເຊື່ອງ loadingIndicator ຫຼັງຈາກ fetch ສຳເລັດ

        if (data.success) {
            modalMessage.textContent = data.message;
            successModal.style.display = 'block';
            successModalButton.onclick = function() {
                successModal.style.display = 'none';
            };
            this.reset();
        } else {
            errorMessage.textContent = data.message || 'ເກີດຂໍ້ຜິດພາດ. ກະລຸນາລອງໃໝ່.';
            errorModal.style.display = 'block';
            errorModalButton.onclick = function() {
                errorModal.style.display = 'none';
            };
        }
    } catch (error) {
        console.error('Error:', error);
        submitButton.disabled = false;
        loadingIndicator.style.display = 'none'; // ເຊື່ອງ loadingIndicator ເມື່ອເກີດຂໍ້ຜິດພາດ
        errorMessage.textContent = 'ເກີດຂໍ້ຜິດພາດ. ກະລຸນາລອງໃໝ່.';
        errorModal.style.display = 'block';
        errorModalButton.onclick = function() {
            errorModal.style.display = 'none';
        };
    }
});
    </script>
</body>
</html>