document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".delete-btn");
  const deleteModal = document.getElementById("deleteModal");
  const confirmDelete = document.getElementById("confirmDelete");
  const cancelDelete = document.getElementById("cancelDelete");

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const token = this.getAttribute("data-id");
      // Met à jour dynamiquement le lien du bouton "Oui, supprimer"
      confirmDelete.setAttribute("href", "/admin/delete-appointment/" + token);
      deleteModal.style.display = "flex";
    });
  });

  cancelDelete.addEventListener("click", function () {
    deleteModal.style.display = "none";
  });

  // Fermer la modal si on clique en dehors
  deleteModal.addEventListener("click", function (e) {
    if (e.target === deleteModal) {
      deleteModal.style.display = "none";
    }
  });
});
