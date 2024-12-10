function toggleText() {
    const fullText = document.querySelector('.full-text');
    const button = document.getElementById('toggleButton');

    if (fullText.style.display === 'none' || fullText.style.display === '') {
        fullText.style.display = 'block';
        button.innerText = 'Klikni za manje';
    } else {
        fullText.style.display = 'none';
        button.innerText = 'Klikni za više';
    }
}
