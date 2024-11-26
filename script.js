document.getElementById('promoForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const promoCode = document.getElementById('promoCode').value;

    fetch('api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ promoCode })
    })
    .then(response => response.json())
    .then(data => {
        const resultDiv = document.getElementById('result');
        if (data.success) {
            resultDiv.innerHTML = Votre commission est de ${data.commission} FCFA.;
        } else {
            resultDiv.innerHTML = Erreur : ${data.message};
        }
    })
    .catch(error => console.error('Erreur:', error));
});
