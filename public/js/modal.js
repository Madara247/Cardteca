    const cards = document.querySelectorAll(".card");
    const modal = document.getElementById("card-modal");
    const modalTitle = document.getElementById("modal-title");
    const modalImage = document.getElementById("modal-image");
    const modalDescription = document.getElementById("modal-description");
    const closeModal = document.getElementById("close-modal");

    cards.forEach(card => {
        card.addEventListener("click", () => {
            const cardId = card.dataset.id;

            fetch(`/api/carta/${cardId}`)
    .then(res => {
        if (!res.ok) throw new Error("Errore nella risposta API");
        return res.json();
    })
    .then(data => {
        modalTitle.textContent = data.title;
        modalImage.src = data.image;
        modalDescription.textContent = data.description;
        modal.classList.add("active");
    })
    .catch(err => {
        console.error("Errore:", err);
        alert("Errore nel caricamento della carta.");
    });

        });
    });

    closeModal.addEventListener("click", () => {
        modal.classList.remove("active");
    });

    modal.addEventListener("click", e => {
        if (e.target === modal) {
            modal.classList.remove("active");
        }
    });