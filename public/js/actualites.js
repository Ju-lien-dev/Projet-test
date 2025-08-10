document.querySelectorAll(".delete-btn").forEach((button) => {
  button.addEventListener("click", () => {
    const articleId = button.getAttribute("data-id");
    let containerCards = document.querySelector(".containerCards");
    const div = document.createElement("div");
    const textDiv = document.createElement("div");
    const buttonDiv = document.createElement("div");
    let p = document.createElement("p");

    containerCards.appendChild(div),
      div.append(textDiv, buttonDiv),
      textDiv.appendChild(p),
      Object.assign(div.style, {
        position: "fixed",
        top: "50%",
        left: "50%",
        transform: "translate(-50%, -50%)",
        height: "200px",
        width: "300px",
        backgroundColor: "rgb(3, 76, 133)",
        color: "white",
        padding: "20px",
        textAlign: "center",
        zIndex: "1000", // s'assurer qu'elle soit au-dessus
        boxShadow: "0 4px 8px rgba(0,0,0,0.2)",
      });

    Object.assign(textDiv.style, {
      padding: "4px",
    });

    p.textContent = "Etes vous sur de vouloir suprimer cette actualité?";

    Object.assign(p.style, {
      fontSize: "18px",
    });

    Object.assign(buttonDiv.style, {
      marginTop: "20px",
      display: "flex",
      justifyContent: "space-around",
    });

    const cancelBtn = document.createElement("button");
    cancelBtn.textContent = "Annuler";
    Object.assign(cancelBtn.style, {
      padding: "10px 20px",
      backgroundColor: "#555",
      color: "white",
      border: "none",
      borderRadius: "5px",
      cursor: "pointer",
    });
    cancelBtn.addEventListener("click", () => {
      div.remove();
    });

    // Bouton Supprimer
    const deleteBtn = document.createElement("button");
    deleteBtn.textContent = "Supprimer";
    Object.assign(deleteBtn.style, {
      padding: "10px 20px",
      backgroundColor: "#d9534f",
      color: "white",
      border: "none",
      borderRadius: "5px",
      cursor: "pointer",
    });
    deleteBtn.addEventListener("click", () => {
      alert("Suppression confirmée !");
      window.location.href = `/accueil/admin/delete/${articleId}`;
    });

    buttonDiv.append(cancelBtn, deleteBtn);
    div.appendChild(buttonDiv);
  });
});
