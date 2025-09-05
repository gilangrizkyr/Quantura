<!-- js -->
<script src="<?= base_url('assets/master/vendors/scripts/core.js') ?>"></script>
<script src="<?= base_url('assets/master/vendors/scripts/script.min.js') ?>"></script>
<script src="<?= base_url('assets/master/vendors/scripts/process.js') ?>"></script>
<script src="<?= base_url('assets/master/vendors/scripts/layout-settings.js') ?>"></script>
<script src="<?= base_url('assets/master/src/plugins/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/master/src/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/master/src/plugins/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/master/src/plugins/datatables/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/master/src/plugins/datatables/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe
        src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
        height="0"
        width="0"
        style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatBox = document.getElementById('chat-box');
        const input = document.getElementById('chat-input');
        const button = document.getElementById('chat-send');

        function escapeHtml(unsafe) {
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function appendMessage(text, sender = 'user', isLoading = false) {
            const time = new Date().toLocaleTimeString();
            const name = sender === 'user' ? 'Saya' : 'AI';

            let safeText = escapeHtml(text);
            safeText = safeText.replace(/\n/g, '<br>');
            safeText = safeText.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

            const loadingHtml = isLoading ? '<em>Sedang Mengetik.....</em>' : '';
            const loadingIdAttr = isLoading ? `id="loading-msg"` : '';

            const bubbleWrapper = document.createElement('div');
            bubbleWrapper.setAttribute('style', `
        display: flex;
        justify-content: ${sender === 'user' ? 'flex-end' : 'flex-start'};
        margin-bottom: 10px;
    `);
            if (isLoading) bubbleWrapper.id = "loading-msg";

            const bubble = document.createElement('div');
            bubble.setAttribute('style', `
        background-color: ${sender === 'user' ? '#007bff' : '#f5f5f5ff'};
        color: ${sender === 'user' ? 'white' : 'black'};
        padding: 10px;
        border-radius: 10px;
        max-width: 70%;
        white-space: pre-wrap;
        font-size: 14px;
    `);

            const meta = document.createElement('div');
            meta.setAttribute('style', 'font-size: 12px; opacity: 0.6; margin-bottom: 5px;');
            meta.textContent = `${name} • ${time}`;

            const message = document.createElement('div');
            message.innerHTML = safeText + (isLoading ? loadingHtml : '');

            bubble.appendChild(meta);
            bubble.appendChild(message);
            bubbleWrapper.appendChild(bubble);
            chatBox.appendChild(bubbleWrapper);

            chatBox.scrollTop = chatBox.scrollHeight;
        }


        // Hapus elemen loading saat AI sudah selesai menjawab
        function removeLoading() {
            const loadingMsg = document.getElementById('loading-msg');
            if (loadingMsg) {
                loadingMsg.remove();
            }
        }

        button.addEventListener('click', function() {
            const message = input.value.trim();
            if (message === '') return;

            appendMessage(message, 'user');
            appendMessage('', 'Quantura AI', true);

            fetch('/index.php/chat/ask', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'message=' + encodeURIComponent(message)
                })
                .then(res => res.json())
                .then(data => {
                    removeLoading();
                    appendMessage(data.reply || 'Tidak ada jawaban.', 'ai');
                    input.value = '';
                })
                .catch(err => {
                    removeLoading();
                    appendMessage('Gagal menghubungi server: ' + err.message, 'ai');
                });
        });


        // -----------------------------------------//
        // Mengambil sebuah data
        // button.addEventListener('click', function() {
        //     const message = input.value.trim();
        //     if (message === '') return;

        //     appendMessage(message, 'user');

        //     // Tampilkan loading dulu
        //     appendMessage('', 'ai', true);

        //     fetch('/index.php/chat/ask', {
        //             method: 'GET',
        //             headers: {
        //                 'Content-Type': 'application/x-www-form-urlencoded'
        //             },
        //             body: 'message=' + encodeURIComponent(message)
        //         })
        //         .then(res => res.json())
        //         .then(data => {
        //             removeLoading();
        //             appendMessage(data.reply || 'Tidak ada jawaban.', 'ai');
        //             input.value = '';
        //         })
        //         .catch(err => {
        //             removeLoading();
        //             appendMessage('Gagal menghubungi server: ' + err.message, 'ai');
        //         });
        // });


        // -----------------------------------------//
        // Menghapus Sebuah Data
        // button.addEventListener('click', function() {
        //     const message = input.value.trim();
        //     if (message === '') return;

        //     appendMessage(message, 'user');

        //     // Tampilkan loading dulu
        //     appendMessage('', 'ai', true);

        //     fetch('/index.php/chat/ask', {
        //             method: 'DELETE',
        //             headers: {
        //                 'Content-Type': 'application/x-www-form-urlencoded'
        //             },
        //             body: 'message=' + encodeURIComponent(message)
        //         })
        //         .then(res => res.json())
        //         .then(data => {
        //             removeLoading();
        //             appendMessage(data.reply || 'Tidak ada jawaban.', 'ai');
        //             input.value = '';
        //         })
        //         .catch(err => {
        //             removeLoading();
        //             appendMessage('Gagal menghubungi server: ' + err.message, 'ai');
        //         });
        // });

        // Kirim saat Enter ditekan
        input.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                button.click();
            }
        });
    });
</script>
</body>

</html>