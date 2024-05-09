document.querySelectorAll('.reply-btn').forEach(button => {
    button.addEventListener('click', () => {
        // Tìm form trả lời liền kề với nút "Trả lời" được bấm
        const replyForm = button.parentNode.querySelector('.reply-form');
        // Ẩn tất cả các form trả lời trước khi hiển thị form trả lời của bình luận được chọn
        document.querySelectorAll('.reply-form').forEach(form => {
            form.style.display = 'none';
        });
        // Hiển thị form trả lời của bình luận được chọn
        replyForm.style.display = 'block';
    });
});