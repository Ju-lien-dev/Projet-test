document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".delete-btn");
  const deleteModal = document.getElementById("deleteModal");
  const confirmDelete = document.getElementById("confirmDelete");
  const cancelDelete = document.getElementById("cancelDelete");
  let deleteHref = "";

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const token = this.getAttribute("data-id");
      deleteHref = "/accueil/admin/delete-appointment/" + token;
      deleteModal.style.display = "flex";
    });
  });

  confirmDelete.addEventListener("click", function () {
    if (deleteHref) {
      window.location.href = deleteHref;
    }
  });

  cancelDelete.addEventListener("click", function () {
    deleteModal.style.display = "none";
  });

  deleteModal.addEventListener("click", function (e) {
    if (e.target === deleteModal) {
      deleteModal.style.display = "none";
    }
  });
});
