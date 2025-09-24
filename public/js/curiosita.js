document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal');
    const modalImg = document.getElementById('modalImg');
    const closeModal = document.getElementById('closeModal');

    document.querySelectorAll('.curiosita img').forEach(img => {
        img.addEventListener('click', () => {
            modalImg.src = img.src;
            modal.style.display = 'flex';
        });
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
        modalImg.src = '';
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
            modalImg.src = '';
        }
    });

    const token = document.querySelector('meta[name="csrf-token"]').content;
    const utenteId = document.querySelector('meta[name="utente-id"]').content;

    document.getElementById('contenitore').addEventListener('click', function (e) {
        if (e.target.classList.contains('cuore')) {
            const cuore = e.target;
            const idArticolo = cuore.dataset.id;

            fetch("/curiosita/toggle", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    id_utente: utenteId,
                    id_articolo: idArticolo
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'aggiunto') {
                        cuore.classList.add('salvato');
                        cuore.innerHTML = '&#9829;';
                        cuore.title = 'Rimuovi dai preferiti';
                    } else if (data.status === 'rimosso') {
                        cuore.classList.remove('salvato');
                        cuore.innerHTML = '&#9825;';
                        cuore.title = 'Aggiungi ai preferiti';
                    }
                })
                .catch(() => alert('Errore nella richiesta'));
        }
    });
});
